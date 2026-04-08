import React from 'react'
import { useState } from 'react';
import axios from 'axios';
import { useEffect } from 'react';
import NavBarAdmin from './NavBarAdmin';
import AdminOceneView from './AdminOceneView';
import { useNavigate } from 'react-router-dom';

function AdminOcene() {

    let [ocene, setOcene] = useState([]);

    const token = window.sessionStorage.getItem("auth_token");
    const admin = window.sessionStorage.getItem("admin_id");
    const id = parseInt(admin, 10);

    useEffect(() => {
        const fetchData = async () => {
            try {
                const response = await axios.get(`http://127.0.0.1:8000/api/ocene`, {
                    headers: {
                        Authorization: "Bearer " + token,
                    },
                });
                setOcene(response.data.ocene);
            } catch (error) {
                console.log(error);
            }
        };
        fetchData();
    }, [token, id]);

  return (
    <div>
        <NavBarAdmin/>
        <div className="container mt-4">

           <h2 style={{marginBottom:"20px"}}>Ocene</h2>

            <table className="table table-striped" style={{background:"white"}}>
                    <thead>
                        <tr>
                            <th>Datum</th>
                            <th>Ocena</th>
                            <th>Učenik</th>
                            <th>Predmet</th>
                            <th>Opis</th>
                            <th>Profesor</th>
                            <th> </th>
                        </tr>
                    </thead>

                    {ocene.map((ocena) => (
              <AdminOceneView ocena={ocena} key={ocena.datum} />
            ))}

            </table>
        
        
        </div>
      
    </div>
  )
}

export default AdminOcene

 /*
import React, { useState, useEffect } from 'react';
import axios from 'axios';
import NavBarAdmin from './NavBarAdmin';
import AdminOceneView from './AdminOceneView';

function AdminOcene() {
    const [ocene, setOcene] = useState([]);
    const [selectedDate, setSelectedDate] = useState('');
    const [currentPage, setCurrentPage] = useState(1);
    const ocenePerPage = 20;

    useEffect(() => {
        const fetchData = async () => {
            try {
                const response = await axios.get(`http://127.0.0.1:8000/api/ocene`);
                setOcene(response.data.ocene);
            } catch (error) {
                console.log(error);
            }
        };
        fetchData();
    }, []);

    const filterOceneByDate = () => {
        const filteredOcene = ocene.filter(ocena => ocena.datum === selectedDate);
        return filteredOcene;
    };

    const handleDateChange = (event) => {
        setSelectedDate(event.target.value);
    };

    const indexOfLastOcena = currentPage * ocenePerPage;
    const indexOfFirstOcena = indexOfLastOcena - ocenePerPage;
    const visibleOcene = filterOceneByDate().slice(indexOfFirstOcena, indexOfLastOcena);

    const paginate = (pageNumber) => {
        setCurrentPage(pageNumber);
    };

    const pageNumbers = [];
    for (let i = 1; i <= Math.ceil(filterOceneByDate().length / ocenePerPage); i++) {
        pageNumbers.push(i);
    }

    return (
        <div>
            <NavBarAdmin />
            <div className="container mt-4">
                <h2 style={{ marginBottom: "20px" }}>Učenici</h2>
                <input
                    type="date"
                    placeholder="Datum"
                    className="form-control mb-3"
                    value={selectedDate}
                    onChange={handleDateChange}
                />
                <table className="table table-striped" style={{ background: "white" }}>
                    <thead>
                        <tr>
                            <th>Datum</th>
                            <th>Ocena</th>
                            <th>Učenik</th>
                            <th>Predmet</th>
                            <th>Opis</th>
                            <th>Profesor</th>
                        </tr>
                    </thead>
                    <tbody>
                        {visibleOcene.map((ocena) => (
                            <AdminOceneView ocena={ocena} key={ocena.datum} />
                        ))}
                    </tbody>
                </table>
                <ul className="pagination">
                    {pageNumbers.map(number => (
                        <li key={number} className="page-item">
                            <button onClick={() => paginate(number)} className="page-link">
                                {number}
                            </button>
                        </li>
                    ))}
                </ul>
            </div>
        </div>
    );
}

export default AdminOcene;
*/