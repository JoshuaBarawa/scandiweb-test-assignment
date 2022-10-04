import React, { useState } from 'react'
import './addproduct.css'
import InputField from '.././reUsableComponents/inputField/InputField'
import SelectField from '.././reUsableComponents/selectField/SelectField'
import { createProduct } from '../APICalls';
import { useNavigate, Link } from 'react-router-dom';


function AddProduct() {

    const errorMessage = "Please, submit required data!"
    const navigate = useNavigate()

    const selects = ['DVD', 'Furniture', 'Book']
    const [product, setProduct] = useState({
        sku: '',
        name: '',
        price: '',
        productType: '',
        size: null,
        height: null,
        width: null,
        length: null,
        weight: null
    })
    

    const handleOnChange = (e) => {
        setProduct({ ...product, [e.target.name]: e.target.value })
    }

    
    const handleCreateProduct = () => {
        createProduct(product)
        //navigate('/')
    }


   
    return (
        
     <form id="product_form" onSubmit={handleCreateProduct}>
        <div id='form_title'>
            <p id="title">Product Add</p>
        <div className="form_buttons">
          <button type='submit' id='submit_button'>Save</button>
          <Link type='button' id='cancel_button' to='/'>Cancel</Link>
        </div>
        </div>

      <div className="form_inputs">

      <InputField name="sku" id="sku" label="SKU" type='text' required={true}
                handleChange={handleOnChange} errorMessage={errorMessage} />

<InputField name="name" id="name" label="Name" type='text' required={true}
                handleChange={handleOnChange} errorMessage={errorMessage} />


<InputField name="price" id="price" label="Price $" type='number' required={true} 
                handleChange={handleOnChange} errorMessage={errorMessage} />


<SelectField name="productType" id="productType" label='Type Switcher' selects={selects} required={true} 
                placeholder='Choose product type' handleChange={handleOnChange}  errorMessage={errorMessage} />

       

          
    { product?.productType === 'DVD' ?  

        <InputField name="size" id="size" label="Size (MB)" type='number' required={true} 
        handleChange={handleOnChange} errorMessage={errorMessage} />

           : product?.productType === "Furniture" ?

           <>
            <InputField name="height" id="height" label="Height (CM)" type='number' required={true} 
        handleChange={handleOnChange} errorMessage={errorMessage} />

<InputField name="width" id="width" label="Width (CM)" type='number' required={true} 
        handleChange={handleOnChange} errorMessage={errorMessage} />

<InputField name="length" id="length" label="Length (CM)" type='number' required={true} 
        handleChange={handleOnChange} errorMessage={errorMessage} />

        </>

           : product?.productType === 'Book' ?

           <InputField name="weight" id="weight" label="Weight (KG)" type='number' required={true}
        handleChange={handleOnChange} errorMessage={errorMessage} />
                : ''
        }
          
                
            </div>


            </form>

    )
}


export default AddProduct;