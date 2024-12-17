
import './App.css';
import "./Components/Header/Header.js"
import Header from './Components/Header/Header';
import CarteRow from './Components/CarteRow/CarteRow';

function App() {



  return (
    <div className="d-flex flex-column align-items-center debug">
     <Header />
     <div>Clicca sulle tre carte: Presente Passato e Futuro</div>
    <CarteRow />
    </div>
  );
}

export default App;
