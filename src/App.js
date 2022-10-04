
import {Route, Routes, BrowserRouter} from 'react-router-dom'
import ProductList from './components/productList/ProductList';
import AddProduct from './components/addProduct/AddProduct';
import Footer from './components/footer/Footer'
import './App.css';

function App() {
  return (

    <BrowserRouter>

    <div className='container'>
      <Routes>
        <Route exact path='/' element={<ProductList />} />
        <Route exact path='/add-product' element={<AddProduct />} />
      </Routes>
      <Footer />

    </div>
    </BrowserRouter>

  );
}

export default App;
