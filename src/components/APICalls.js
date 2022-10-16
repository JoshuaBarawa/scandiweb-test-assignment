
import axios from "axios";



export const getAllProducts = async () => {
    try {
        return await axios.get('https://techrollblogs.com/php_api/api/productList.php')
    } catch (err) {
        console.log(err)
    }
}



export const createProduct = async (product) => {
    try {
        await axios.post('https://techrollblogs.com/php_api/api/create.php', product)
    } catch (err) {
        console.log(err)
    }
}



export const deleteProduct = async (id) => {
    try {
        await axios.delete(`https://techrollblogs.com/php_api/api/delete.php`, { data: { 'id': id }});
    } catch (err) {
        console.log(err)
    }
}
