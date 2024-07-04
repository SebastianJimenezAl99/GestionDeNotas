import { Link } from 'react-router-dom';
//import './Navbar.css';

function Navbar() {
    return(
        <nav className='h-12 flex justify-around bg-black text-white text-2xl w-screen items-center'> 
            <ul className='w-full flex justify-around it '>
                <li>
                    Gestor De Notas
                </li>
                <li className=''>
                    <Link className='' to="/">Home</Link>
                </li>
                <li className=''>
                    <Link className='' to="/estudiantes">Estudiantes</Link>
                </li>
                <li>
                    <Link className='' to="/cursos">Cursos</Link>
                </li>
                <li>
                    <Link className='' to="/materias">Materias</Link>
                </li>
                <li className=''>
                    <Link className='' to="/notas">Notas</Link>
                </li>
            </ul>
        </nav>
    )
}

export default Navbar;