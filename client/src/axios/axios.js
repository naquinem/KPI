import axios from "axios";

const axiosClient = axios.create({
    baseURL: 'http://localhost:8000/api',
    withCredentials: true,
    headers: {
        "Accept": "application/json",
        "Content-Type": "application/json",
        //"Authorization": "Bearer"+localStorage.getItem('token'),
    }
});

export default axiosClient;
