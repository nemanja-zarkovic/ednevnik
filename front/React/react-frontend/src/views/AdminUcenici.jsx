import React from 'react'
import { useState } from 'react';
import axios from 'axios';
import { useEffect } from 'react';
import NavBarAdmin from './NavBarAdmin';
import AdminUceniciView from './AdminUceniciView';
import { useNavigate } from 'react-router-dom';

function AdminUcenici() {

  let [ucenici, setUcenici] = useState([]);
  const [searchTerm, setSearchTerm] = useState('');

  const token = window.sessionStorage.getItem("auth_token");
  const admin = window.sessionStorage.getItem("admin_id");
  const id = parseInt(admin, 10);

  const navigate = useNavigate();

  useEffect(() => {
    const fetchData = async () => {
        try {
            const response = await axios.get(`http://127.0.0.1:8000/api/ucenici`, {
                headers: {
                    Authorization: "Bearer " + token,
                },
            });
            setUcenici(response.data.data);
        } catch (error) {
            console.log(error);
        }
    };
    fetchData();
}, [token, id]);

const handleSearchChange = (event) => {
  setSearchTerm(event.target.value);
};

const filteredUcenici = ucenici.filter(ucenik =>
  ucenik.ime.toLowerCase().includes(searchTerm.toLowerCase()) ||
  ucenik.prezime.toLowerCase().includes(searchTerm.toLowerCase())
);

if (token === null || admin==null) {
  return (
    <div
      style={{
        display: "flex",
        flexDirection: "column",
        alignItems: "center",
        justifyContent: "center",
        height: "100vh",
      }}
    >
      <h5>Vratite se na login stranicu i pokušajte ponovo.</h5>
      <button
        type="button"
        className="btn btn-primary"
        data-mdb-ripple-init
        style={{ marginTop: "16px" }} 
        onClick={() => navigate("/pocetna")}
      >
        Login stranica
      </button>
    </div>
  );
}

  return (
    <div>
      <NavBarAdmin/>
      <div className="container mt-4">

                <h2 style={{marginBottom:"20px"}}>Učenici</h2>
                
                <input
                  type="text"
                  placeholder="Pretraga po imenu i prezimenu"
                  value={searchTerm}
                  onChange={handleSearchChange}
                  className="form-control mb-3"
                />

                <table className="table table-striped" style={{background:"white"}}>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ime i prezime</th>
                            <th>Odeljenje</th>
                        </tr>
                    </thead>

            

                  {filteredUcenici.map((ucenik) => (
              <AdminUceniciView ucenik={ucenik} key={ucenik.id} />
            ))}

                 

                    </table>
            </div>




    </div>
  )
}

export default AdminUcenici
