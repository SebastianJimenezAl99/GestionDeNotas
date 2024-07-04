import { useEffect } from "react";
import { useState } from "react";
import { Await } from "react-router-dom";

function Estudiante() {

  const [estudiantes, setEstudiantes] = useState([]);
  const [cursos, setCursos] = useState([]);

  function ObtenerEstudiante() {
    fetch('http://127.0.0.1:8000/api/estudiantes')
          .then(response => response.json())
          .then(data => setEstudiantes(data))
          .catch(error => console.error('Error fetching data:', error));
  }

  useEffect(() => {
    ObtenerEstudiante();
  }, []);

  useEffect(() => {
    fetch('http://127.0.0.1:8000/api/cursos')
        .then(response => response.json())
        .then(data => setCursos(data))
        .catch(error => console.error('Error fetching data:', error));
  }, []);

  const obtenerNombreCurso = (cursoId) => {
    const curso = cursos.find(curso => curso.id === cursoId);
    return curso ? curso.nombre : 'N/A';
  };
  

  function activarFormulario() {
      const divFomulario = document.getElementById('estudianteFormulario');
      divFomulario.classList.remove('hidden')

  }

    const handleCancel = (event) => {
        event.preventDefault();
        document.getElementById('jsonForm').reset();
        const divFomulario = document.getElementById('estudianteFormulario');
        divFomulario.classList.add('hidden');
    };
    
      const handleSubmit = (event) => {
        event.preventDefault();
        const firstName = document.getElementById('firstName').value;
        const lastName = document.getElementById('lastName').value;
        const course = document.getElementById('course').value;
    
        const formData = {
          nombre: firstName,
          apellido: lastName,
          curso_id: course
        };
        
        fetch('http://127.0.0.1:8000/api/estudiantes/', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json'
          },
          body: JSON.stringify(formData)
        })
        .then(response => response.json())
        .then(data => {
            console.log('Success:', data);
            ObtenerEstudiante();
        })
        .catch((error) => {
            console.error('Error:', error);
        });

        const divFomulario = document.getElementById('estudianteFormulario');
        divFomulario.classList.add('hidden');
      };

      const eliminarEstudiante = async (id) => {
        Swal.fire({
          title: "¿Estás seguro de que deseas eliminar este estudiante?",
          showDenyButton: true,
          showCancelButton: true,
          confirmButtonText: "Si",
          denyButtonText: `No`
        }).then((result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            Swal.fire("Eliminado!", "", "success");
          }
        });
        
      };
    
    return(
        <div className="mt-10 flex flex-col items-center">
            <div className="w-4/5  flex justify-between">
                <h1 className="font-bold text-xl">Vista Estudiante</h1>
                <button 
                className="border-2 border-blue-500 rounded p-1 bg-blue-500 text-white font-bold"
                onClick={activarFormulario}
                >Crear Estudiante</button>
            </div>
            <div id="estudianteFormulario" className="hidden">
            <form id="jsonForm" className="space-y-4" onSubmit={handleSubmit}>
      <div>
        <label htmlFor="firstName" className="block text-sm font-medium text-gray-700">Nombre</label>
        <input type="text" id="firstName" name="firstName" className="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required />
      </div>
      <div>
        <label htmlFor="lastName" className="block text-sm font-medium text-gray-700">Apellido</label>
        <input type="text" id="lastName" name="lastName" className="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required />
      </div>
      <div>
        <label htmlFor="course" className="block text-sm font-medium text-gray-700">Curso</label>
        <select id="course" name="course" className="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
          {cursos.map(curso => (
                <option key={curso.id} value={curso.id}>
                    {curso.nombre}
                </option>
            ))}
        </select>
      </div>
      <div className="flex justify-between">
        <button type="submit" className="w-1/2 px-4 py-2 bg-indigo-600 text-white font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Guardar</button>
        <button type="button" className="w-1/2 ml-2 px-4 py-2 bg-red-600 text-white font-medium rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2" onClick={handleCancel}>Cancelar</button>
      </div>
    </form>
    </div>
      <table className="table-fixed w-4/5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Curso</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            {estudiantes.map(estudiante => (
                <tr key={estudiante.id}>
                    <td>{estudiante.id}</td>
                    <td>{estudiante.nombre}</td>
                    <td>{estudiante.apellido}</td>
                    <td>{obtenerNombreCurso(estudiante.curso_id)}</td>
                    <td>
                        <button className="border-2 border-green-500 rounded p-1 bg-green-500 text-white font-bold">Editar</button>
                        <button className="border-2 border-red-500 rounded p-1 bg-red-500 text-white font-bold" onClick={() => eliminarEstudiante(estudiante.id)} >Eliminar</button>
                    </td>
                </tr>
            ))}
        </tbody>
      </table>        
    </div>
    )
}

export default Estudiante;