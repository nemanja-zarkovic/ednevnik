import React, { useState, useEffect } from 'react';
import { useParams } from 'react-router-dom';
import NavBar from './NavBar';
import axios from 'axios';
import OcenaPredmetView from './OcenaPredmetView';
import { useNavigate } from 'react-router-dom';

const OcenaPredmet = () => {
    const { predmetId } = useParams();
    const [ocene, setOcene] = useState([]);
    const navigate = useNavigate();

    const handleNavigateToPredmeti= () => {
      navigate("/predmeti-ucenik"); 
    };

    useEffect(() => {
        if (!predmetId) {
            console.error("Nedostaje predmetId u parametrima putanje");
            return;
        }

        const token = window.sessionStorage.getItem("auth_token");
        const ucenikId = parseInt(window.sessionStorage.getItem("ucenik_id"), 10);
        const config = {
            method: "get",
            url: `http://127.0.0.1:8000/api/ocene-iz-predmeta/${predmetId}/${ucenikId}`,
            headers: {
                Authorization: "Bearer " + token,
            },
        };

        axios
            .request(config)
            .then((response) => {
                console.log(response);
                setOcene(response.data.ocene);
            })
            .catch((error) => {
                console.log(error);
            });
    }, [predmetId]);

    const prosecanProsek = () => {
        if (ocene.length === 0) return 0;

        const sumaOcena = ocene.reduce((acc, ocena) => acc + ocena.ocena, 0);
        return sumaOcena / ocene.length;
    };

    return (
        <div>
            <NavBar />
            <h2 style={{ width: "100%", textAlign: "center", paddingTop: "10px", marginBottom: "20px", paddingBottom: "10px", backgroundColor: "white" }}>
                Prosečna ocena: {prosecanProsek().toFixed(2)}
            </h2>
            <div style={{ display: "flex", flexWrap: "wrap", justifyContent: "center", gap: '15px', marginTop:"50px", marginBottom:"50px" }}>
                {ocene.map((ocena) => (
                    <OcenaPredmetView ocena={ocena} key={ocena.id} style={{ margin: "8px" }} />
                ))}
            </div>

            <button
            type="button"
            className="btn btn-primary"
            style={{  margin: "0 auto", display: "block", marginTop:"20px"}}
            onClick={handleNavigateToPredmeti}
             >
               Predmeti
             </button>
        </div>
    );
};

export default OcenaPredmet;

