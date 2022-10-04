
import React, {useState} from 'react'
import './selectField.css'

function SelectField(props){

    const {label, errorMessage, required ,handleChange, name, value, selects, placeholder} = props
    const [focused, setFocused] = useState(false)

    const handleFocus = () =>{
        setFocused(true)
    }

    return(
    <div className="select-group">
        <label className='form-label'>{label}</label>
        <select name={name} className='select-control' required={required} value={value} onChange={handleChange} onBlur={handleFocus} focused={focused.toString()}>
        <option disabled style={{fontSize:'14px', opacity: 0.5}} selected value=''>{placeholder}</option>
            {selects.map((select ,id) => 
                 <option id='option' key={id} style={{fontSize:'14px'}} value={select}>{select}</option>
            )}
        </select>
        <span className="error">{errorMessage}</span>
    </div>
    )
    
}

export default SelectField