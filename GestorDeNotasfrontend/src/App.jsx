import './App.css';
import Navbar from './components/Navbar';
import Home from './components/Home';
import Curso from './components/Curso';
import Materia from './components/Materia';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Estudiante from './components/Estudiante';



function App() {
  


  return (
    <Router>
      <div className='w-screen h-screen bg-orange-200'>
        <Navbar />
        <Routes>
          <Route path="/" element={<Home />} />
          <Route path="/cursos" element={<Curso />} />
          <Route path="/materias" element={<Materia />} />
          <Route path="/estudiantes" element={<Estudiante />} />
        </Routes>
      </div>
    </Router>
  );
}

export default App;
