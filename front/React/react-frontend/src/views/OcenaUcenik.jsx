import React from 'react'
import { useNavigate } from 'react-router-dom';
import { useState } from 'react';
import { useEffect } from 'react';
import axios from 'axios';
import OcenaPredmetView from './OcenaPredmetView';
import NavBarProfesor from './NavBarProfesor';

function OcenaUcenik() {

    const navigate = useNavigate();

    const token =  window.sessionStorage.getItem("auth_token");

    const ucenik = window.sessionStorage.getItem("p_ucenik_id");
    const uid = parseInt(ucenik, 10);

    const profesor = window.sessionStorage.getItem("profesor_id");
    const pid = parseInt(profesor, 10);

    const predmet = window.sessionStorage.getItem("predmet_id");
    const predmetId = parseInt(predmet, 10);

    const razred = window.sessionStorage.getItem("odeljenje_razred");
    const razredId = parseInt(razred, 10);

    const ime = window.sessionStorage.getItem("p_ucenik_ime");
    const prezime = window.sessionStorage.getItem("p_ucenik_prezime");

    const [ocene, setOcene] = useState([]);

    const [novaOcena, setNovaOcena] = useState(
      { 
        vrednost: '', 
        opis: '' ,
        polugodiste: '1'
      });

      const handleInputChange = (e) => {
        const { name, value } = e.target;
        setNovaOcena({ ...novaOcena, [name]: value });
    };

    const handleSubmit = (e) => {
      e.preventDefault();
      if (!novaOcena.vrednost || !novaOcena.opis) {
          alert('Molimo vas da unesete vrednost ocene i opis.');
          return;
      }
      axios.post('http://127.0.0.1:8000/api/unosocene', {
          ucenikId: uid,
          predmetId: predmetId, 
          razredId: 1, 
          datum: new Date().toISOString().split('T')[0],
          opis: novaOcena.opis,
          polugodiste: novaOcena.polugodiste,
          vrednost: novaOcena.vrednost,
          profesorId: pid
      }, {
          headers: {
              Authorization: "Bearer " + token,
          }
      })
      .then((response) => {
          console.log(response);
          alert('Nova ocena uspešno unesena.');
          setNovaOcena({ vrednost: '', opis: '', polugodiste: '1' }); // Resetujemo formu
      })
      .catch((error) => {
          console.log(error);
          alert('Došlo je do greške prilikom unosa nove ocene.');
      });
  };

    useEffect(() => {
        if (token && pid && uid) {
          let config = {
            method: "get",
            url: `http://127.0.0.1:8000/api/ocene-ucenika/${uid}/${pid}`,
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
        } else {
          navigate("/pocetna");
        }
      }, [token, pid, navigate]);

      const prosecanProsek = () => {
        if (ocene.length === 0) return 0;

        const sumaOcena = ocene.reduce((acc, ocena) => acc + ocena.ocena, 0);
        return sumaOcena / ocene.length;
    };





  return (
    <div>
      <NavBarProfesor />
      <h2 style={{ width: "100%", textAlign: "center", paddingTop: "10px", marginBottom: "20px", paddingBottom: "10px", backgroundColor: "white" }}>
            {ime} {prezime}
       </h2>

       <div style={{ display: "flex", justifyContent: "center" }}>

        <div style={{ width: "40%", display:"flex", justifyContent:"right", paddingRight:"100px"}}>
        <form onSubmit={handleSubmit}>
            <div className="mb-3">
                <label htmlFor="vrednost" className="form-label">Vrednost ocene:</label>
                <input type="number" className="form-control" id="vrednost" name="vrednost" value={novaOcena.vrednost} onChange={handleInputChange} min="1" max="5" required />
            </div>
            <div className="mb-3">
                <label htmlFor="opis" className="form-label">Opis ocene:</label>
                <textarea className="form-control" id="opis" name="opis" value={novaOcena.opis} onChange={handleInputChange} required></textarea>
            </div>
            <div className="mb-3">
                <label htmlFor="polugodiste" className="form-label">Polugodište:</label>
                <select className="form-select" id="polugodiste" name="polugodiste" value={novaOcena.polugodiste} onChange={handleInputChange}>
                    <option value="1">Prvo polugodište</option>
                    <option value="2">Drugo polugodište</option>
                </select>
            </div>
            <div className='text-center' style={{ marginBottom: '20px'}}>
                <button type="submit" className="btn btn-primary" style={{}}>Unesi novu ocenu</button>
            </div>
        </form>
    </div>

    <div style={{ width: "50%", marginLeft: "30px" }}>
        <div style={{ display:'flex', flexWrap: "wrap", gap:"15px"}}>
            {ocene.map((ocena) => (
                <OcenaPredmetView ocena={ocena} key={ocena.id} style={{ margin: "8px" }} />
            ))}
        </div>
        
           <div className="card" style={{ width: "18rem", marginTop: "20px" }}>
            <div className="card-header" style={{ color: "navy", fontSize: "24px"}}>Prosečna ocena: {prosecanProsek().toFixed(2)}</div>
           </div>
       
    </div>

</div>

           
    </div>
  )
}

export default OcenaUcenik
