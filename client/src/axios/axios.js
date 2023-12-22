import axios from "axios";

const axiosClient = axios.create({
    baseURL: 'http://127.0.0.1:8000/api',
    withCredentials: true,
    headers: {
        "Accept": "application/json",
        "Content-Type": "application/json",
        //"Authorization": "Bearer"+localStorage.getItem('token'),
    }
});

export default axiosClient;
