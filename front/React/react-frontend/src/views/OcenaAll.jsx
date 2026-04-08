import React, { useEffect, useState } from 'react';
import NavBar from './NavBar';
import OcenaView from './OcenaView';
import axios from 'axios';
import { useNavigate } from "react-router-dom";

function OcenaAll() {
  const token = window.sessionStorage.getItem("auth_token");
  const ucenik = window.sessionStorage.getItem("ucenik_id");
  const id = parseInt(ucenik, 10);
  const navigate = useNavigate();

  const [ocene, setOcene] = useState([]);
  const [selectedOcena, setSelectedOcena] = useState(null);
  const [ocenaCounts, setOcenaCounts] = useState([0, 0, 0, 0, 0]);

  const handleNavigateToHome = () => {
    navigate("/home-ucenik"); 
  };

  useEffect(() => {
    if (!token || !ucenik) return;

    let config = {
      method: "get",
      url: `http://127.0.0.1:8000/api/sve-ocene-ucenika/${id}`,
      headers: {
        Authorization: "Bearer " + token,
      },
    };

    axios
      .request(config)
      .then((response) => {
        console.log(response);
        setOcene(response.data.ocene);
        countOcene(response.data.ocene);
      })
      .catch((error) => {
        console.log(error);
      });
  }, [token, ucenik, id]);

  const handleOcenaChange = (e) => {
    setSelectedOcena(e.target.value === 'null' ? null : parseInt(e.target.value));
  };

  const countOcene = (ocene) => {
    const counts = [0, 0, 0, 0, 0];
    ocene.forEach((ocena) => {
      counts[ocena.ocena - 1]++;
    });
    setOcenaCounts(counts);
  };

  useEffect(() => {
    // eslint-disable-next-line
    google.charts.load('current', { packages: ['corechart'] });
    // eslint-disable-next-line
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      // eslint-disable-next-line
      const data = google.visualization.arrayToDataTable([
        ['Ocena', 'Broj'],
        ['Odličan (5)', ocenaCounts[4]],
        ['Vrlo dobar (4)', ocenaCounts[3]],
        ['Dobar (3)', ocenaCounts[2]],
        ['Dovoljan (2)', ocenaCounts[1]],
        ['Nedovoljan (1)', ocenaCounts[0]],
      ]);

      const options = {
        title: 'Statistika ocena',
        legend: { position: 'none' },
        chartArea: { width: '50%' },
        hAxis: {
          title: 'Broj ocena',
          minValue: 0,
        },
        vAxis: {
          title: 'Ocena',
        },
      };

      // eslint-disable-next-line
      const chart = new google.visualization.BarChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
  }, [ocenaCounts]);

  if (token === null || ucenik == null) {
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
      <NavBar />

      <div style={{ marginBottom: '20px', marginTop: '20px', marginLeft:'8px', marginRight:'8px' }}>
        <select
          value={selectedOcena}
          onChange={handleOcenaChange}
          className="form-select form-select-lg mb-3" aria-label=".form-select-lg example"
        >
          <option value="null">Sve ocene</option>
          <option value="5">(5) Odličan</option>
          <option value="4">(4) Vrlo dobar</option>
          <option value="3">(3) Dobar</option>
          <option value="2">(2) Dovoljan</option>
          <option value="1">(1) Nedovoljan</option>
        </select>
      </div>

      <div style={{ display: "flex", flexWrap: "wrap", justifyContent: "center", gap: '15px' }}>
        {ocene
          .filter((ocena) => selectedOcena === null || ocena.ocena === selectedOcena)
          .map((ocena) => (
            <OcenaView ocena={ocena} key={ocena.id} style={{ margin: "8px" }} />
          ))}
      </div>

      
      <button
        type="button"
        className="btn btn-primary"
        style={{  margin: "0 auto", display: "block", marginTop:"20px"}}
        onClick={handleNavigateToHome}
      >
        Prethodna
      </button>

      <div id="chart_div" style={{ width: '100%', height: '400px', margin: '20px auto' }}></div>


    </div>
  );
}

export default OcenaAll;
