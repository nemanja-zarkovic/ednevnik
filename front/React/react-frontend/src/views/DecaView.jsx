import React from 'react'
import { Link } from 'react-router-dom'

const DecaView  = ({ dete }) => {

  const setUcenikHome = () => {
    window.sessionStorage.setItem("ucenik_id",dete.id);
    window.sessionStorage.setItem("ucenik_ime",dete.ime);
    window.sessionStorage.setItem("ucenik_prezime",dete.prezime);
    window.sessionStorage.setItem("odeljenje_id", dete.odeljenjeId);
  };

  return (
    <div>
      <div className="card" style={{ width: 18 + "rem" }}>
        <Link className="nav-link card-header" to="/home-ucenik" onClick={setUcenikHome}  style={{ color: 'navy', fontSize: '24px' }}>{dete.ime} {dete.prezime}</Link>
        <div className="card-body">
          <h5 className="card-title">učenik</h5>
        </div>
      </div>
    </div>
  )
}

export default DecaView