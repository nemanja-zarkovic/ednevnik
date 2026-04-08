import React from 'react'
import { useState } from 'react';
import axios from 'axios';
import { useEffect } from 'react';
import NavBarAdmin from './NavBarAdmin';

function AdminProfesori() {
    
    let [profesori, setProfesori] = useState([]);

    const token = window.sessionStorage.getItem("auth_token");
    const admin = window.sessionStorage.getItem("admin_id");
    const id = parseInt(admin, 10);


    useEffect(() => {
      const fetchData = async () => {
          try {
              const response = await axios.get(`http://127.0.0.1:8000/api/profesori`, {
                  headers: {
                      Authorization: "Bearer " + token,
                  },
              });
              setProfesori(response.data.data);
          } catch (error) {
              console.log(error);
          }
      };
      fetchData();
  }, [token, id]);


  return (
    <div>
        < NavBarAdmin />
        <div className="container mt-4">
                <h2>Profesori Desete gimnazije</h2>
                <table className="table table-striped" style={{background:"white"}}>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ime i prezime</th>
                            <th>Predmet</th>
                            <th>Odeljenja</th>
                        </tr>
                    </thead>
                    <tbody>
                        {profesori.map(profesor => (
                            <tr key={profesor.id}>
                                <td>{profesor.id}</td>
                                <td>{profesor.ime} {profesor.prezime}</td>
                                <td>{profesor.predmet}</td>
                                <td>{profesor.odeljenja.join(', ')}</td>
                            </tr>
                        ))}
                    </tbody>
                </table>
        </div>
      
    </div>
  )
}

export default AdminProfesori
