import React from 'react'
import { Link } from 'react-router-dom'

const OdeljenjaView  = ({ odeljenje }) => {

    const setOdeljenjeUcenici = () => {
    window.sessionStorage.setItem("odeljenje_id",odeljenje.id);
    window.sessionStorage.setItem("odeljenje_razred",odeljenje.razred);
    window.sessionStorage.setItem("odeljenje_indeks",odeljenje.indeks);

  }; 

  return (
    <div>
      <div className="card" style={{ width: 18 + "rem" }}>
        <Link className="nav-link card-header" to="/odeljenje-ucenici" onClick={setOdeljenjeUcenici} style={{ color: 'navy', fontSize: '24px' }}>odeljenje {odeljenje.razred}-{odeljenje.indeks}</Link>
        <div className="card-body">
          <p className="card-text">Razred: {odeljenje.razred}</p>
          <p className="card-text">Indeks: {odeljenje.indeks}</p>
          <h5 className="card-title" style={{textAlign:"right"}}>X gimnazija</h5>
        </div>
      </div>
    </div>
  )
}

export default OdeljenjaView