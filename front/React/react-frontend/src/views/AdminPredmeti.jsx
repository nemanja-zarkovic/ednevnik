import React from 'react'
import { useState } from 'react';
import axios from 'axios';
import { useEffect } from 'react';
import NavBarAdmin from './NavBarAdmin';

function AdminPredmeti() {

    let [predmeti, setPredmeti] = useState([]);

    const token = window.sessionStorage.getItem("auth_token");
    const admin = window.sessionStorage.getItem("admin_id");
    const id = parseInt(admin, 10);


    useEffect(() => {
      const fetchData = async () => {
          try {
              const response = await axios.get(`http://127.0.0.1:8000/api/predmeti`, {
                  headers: {
                      Authorization: "Bearer " + token,
                  },
              });
              setPredmeti(response.data.data);
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
                <h2>Lista predmeta</h2>
                <table className="table table-striped" style={{background:"white"}}>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Naziv predmeta</th>
                            <th>Godine u kojima se sluša predmet</th>
                        </tr>
                    </thead>
                    <tbody>
                        {predmeti.map(predmet => (
                            <tr key={predmet.id}>
                                <td>{predmet.id}</td>
                                <td>{predmet.naziv}</td>
                                <td>{predmet.razredi.join(', ')}</td>
                            </tr>
                        ))}
                    </tbody>
                </table>
        </div>

    </div>
  )
}

export default AdminPredmeti
