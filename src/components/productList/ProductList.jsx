import React, { useState, useRef, useEffect } from 'react'
import './productlist.css'
import { Link } from 'react-router-dom'
import { getAllProducts, deleteProduct } from '../APICalls';


function ProductList() {

    const [products, setProducts] = useState([])
    const [selected, setSelected] = useState([])
    const isRunned = useRef(false);

    useEffect(() => {
        if (!isRunned.current) {
            getAllProducts().then(res => res.data ? setProducts(res.data) : products)

        }
        return () => {
            isRunned.current = true;
        };
    }, [products])

    console.log(products)

    const handleSelectProduct = (product) => {
        let newArr = [...selected, product]
        setSelected(newArr)
    }

    const handleDeleteProducts = () => {
        selected.map(item => deleteProduct(item.id));
        setProducts(products.filter(value => !selected.includes(value)))
       
    }

    return (
        <div className='product_section'>


            <div id='form_title'>
                <p id="title">Product List</p>
                <div className="form_buttons">
                    <Link type='button' id='add_button' to='/add-product'>ADD</Link>
                    <button type='submit' id='delete_button' onClick={() => handleDeleteProducts()}>MASS DELETE</button>
                </div>
            </div>


            <div className="products">
                {products.length < 1 ? "No Products Available..." :
                    products.map((product) =>
                        <div className='product_card' key={product.id}>
                            <input type="checkbox" className="delete-checkbox" onClick={() => handleSelectProduct(product)} />
                            <div className="card-details">
                                <p>{product.sku}</p>
                                <p>{product.name}</p>
                                <p>{parseInt(product.price).toFixed(2)} $</p>
                                <p>{product.type === 'DVD' ? `Size: ${product.size} MB`
                                    : product.type === 'Furniture' ? `Dimensions: ${product.height}x${product.width}x${product.length} `
                                        : product.type === 'Book' ? `Weight: ${product.weight} KG` : ''}</p>
                            </div>
                        </div>)}
            </div>
        </div>
    )
}


export default ProductList;