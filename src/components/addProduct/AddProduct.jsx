import React, { useState, useRef, useEffect } from 'react'
import './addproduct.css'
import InputField from '.././reUsableComponents/inputField/InputField'
import SelectField from '.././reUsableComponents/selectField/SelectField'
import { createProduct, getAllProducts } from '../APICalls';
import { useNavigate, Link } from 'react-router-dom';


function AddProduct() {

    const errorMessage = "Please, submit required data!"
    const navigate = useNavigate()

    const selects = ['DVD', 'Furniture', 'Book']

    const [product, setProduct] = useState({
        sku: '',
        name: '',
        price: '',
        type: '',
        size: null,
        height: null,
        width: null,
        length: null,
        weight: null
    })

    const [error, setError] = useState('')
    const [skus, setSkus] = useState([])
    const isRunned = useRef(false);

    useEffect(() => {
        if (!isRunned.current) {
            getAllProducts().then(res => {
                res.data.map(product => setSkus(skus => [...skus, product.sku]))
            });
        }
        return () => {
            isRunned.current = true;
        };
    }, [skus])


    const handleOnChange = (e) => {
        setProduct({ ...product, [e.target.name]: e.target.value })
    }


    const handleCreateProduct = (e) => {
        e.preventDefault()
        skus.includes(product.sku) ?
            setError("SKU Already Exist!") : createProduct(product).then(() => navigate("/"))
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

            <p id='skuError'>{error}</p>
            <div className="form_inputs">

                <InputField name="sku" id="sku" label="SKU" type='text' required={true}
                    handleChange={handleOnChange} errorMessage={errorMessage} />


                <InputField name="name" id="name" label="Name" type='text' required={true}
                    handleChange={handleOnChange} errorMessage={errorMessage} />


                <InputField name="price" id="price" label="Price $" type='number' required={true}
                    handleChange={handleOnChange} errorMessage={errorMessage} />


                <SelectField name="type" label='Type Switcher' selects={selects} required={true}
                    placeholder='Choose product type' handleChange={handleOnChange} errorMessage={errorMessage} />




                {product?.type === 'DVD' ?

                    <InputField name="size" id="size" label="Size (MB)" type='number' required={true}
                        handleChange={handleOnChange} errorMessage={errorMessage} />

                    : product?.type === "Furniture" ?

                        <>
                            <InputField name="height" id="height" label="Height (CM)" type='number' required={true}
                                handleChange={handleOnChange} errorMessage={errorMessage} />

                            <InputField name="width" id="width" label="Width (CM)" type='number' required={true}
                                handleChange={handleOnChange} errorMessage={errorMessage} />

                            <InputField name="length" id="length" label="Length (CM)" type='number' required={true}
                                handleChange={handleOnChange} errorMessage={errorMessage} />

                        </>

                        : product?.type === 'Book' ?

                            <InputField name="weight" id="weight" label="Weight (KG)" type='number' required={true}
                                handleChange={handleOnChange} errorMessage={errorMessage} />
                            : ''
                }


            </div>


        </form>

    )
}


export default AddProduct;