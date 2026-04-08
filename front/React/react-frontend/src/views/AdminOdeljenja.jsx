import React from 'react'
import { useState } from 'react';
import axios from 'axios';
import { useEffect } from 'react';
import NavBarAdmin from './NavBarAdmin';

function AdminOdeljenja() {

    let [odeljenja, setOdeljenja] = useState([]);

    const token = window.sessionStorage.getItem("auth_token");
    const admin = window.sessionStorage.getItem("admin_id");
    const id = parseInt(admin, 10);

    const [filteredOdeljenja, setFilteredOdeljenja] = useState([]);
    const [selectedRazred, setSelectedRazred] = useState('');

    useEffect(() => {
      const fetchData = async () => {
          try {
              const response = await axios.get(`http://127.0.0.1:8000/api/odeljenja`, {
                  headers: {
                      Authorization: "Bearer " + token,
                  },
              });
              setOdeljenja(response.data.data);
          } catch (error) {
              console.log(error);
          }
      };
      fetchData();
  }, [token, id]);

  /*const handleRazredChange = (e) => {
    setSelectedRazred(e.target.value === 'null' ? null : parseInt(e.target.value));
  };
  
   <select className="form-select form-select mb-3" aria-label=".form-select example"  defaultValue="null" value={selectedRazred} onChange={handleRazredChange}>
                    <option value="null">Svi razredi</option>
                    <option value="1">Prva godina</option>
                    <option value="2">Druga godina</option>
                    <option value="3">Treća godina</option>
                    <option value="4">Četvrta godina</option>
                </select>
  
  */


  return (
    <div>
         < NavBarAdmin />
         <div className="container mt-4">
                <h2 style={{marginBottom:"20px"}}>Odeljenja Desete gimnazije</h2>
               
                <table className="table table-striped" style={{background:"white"}}>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Odeljenje</th>
                            <th>Razred</th>
                            <th>Broj učenika</th>
                        </tr>
                    </thead>
                    <tbody>
                        {odeljenja.map((odeljenje) =>  (
                            <tr key={odeljenje.id}>
                                <td>{odeljenje.id}</td>
                                <td>{odeljenje.razred}-{odeljenje.indeks}</td>
                                <td>{odeljenje.razred}</td>
                                <td>{odeljenje.broj_ucenika}</td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
    </div>
  )
}

export default AdminOdeljenja
