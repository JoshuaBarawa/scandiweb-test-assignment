
import axios from "axios";



export const getAllProducts = async () => {
    try {
        return await axios.get('http://localhost/api/productList.php')
    } catch (err) {
        console.log(err)
    }
}



export const createProduct = async (product) => {
    try {
        await axios.post('http://localhost/api/create.php', {
            headers:{
                "content-type":"application/json"
            },
            body: JSON.stringify(product)
        })
    } catch (err) {
        console.log(err)
    }
}



export const deleteProduct = async (id) => {
    try {
        await axios.delete(`http://localhost/api/delete.php`, { data: { 'id': id }});
    } catch (err) {
        console.log(err)
    }
}
