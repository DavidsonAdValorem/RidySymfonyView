import axios from "axios";

export async function createSkill(data){
    try {
        const response = await axios.post('/api/create/skill', data)
        return response.data
    } catch (error) {
        console.error(error);
        return []; 
    }
}

export async function editSkill(id, data){
    try {
        const response = await axios.put(`/api/update/skill/${id}`, data)
        return response.data
    } catch (error) {
        console.error(error);
        return []; 
    }
}

export async function getSkill(id){
    try {
        const response = await axios.get(`/api/getSkill/${id}`)
        return response.data
    } catch (error) {
        console.error(error);
        return []; 
    }
}

export async function getSkills () {
    try {
        const response = await axios.get("/api/getSkills")
        return response.data
    } catch (error) {
        console.error(error);
        return []; 
    }
}

export async function  deleteSkill(id) {
    try {
        const response = await axios.delete(`/api/skill/delete/${id}`)
        return response.data
    } catch (error) {
        console.error(error);
        return []; 
    }
}