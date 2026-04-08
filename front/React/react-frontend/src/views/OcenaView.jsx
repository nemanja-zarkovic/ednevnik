import React from 'react'

const OcenaView  = ({ ocena }) => {
  return (
    <div>
      <div className="card" style={{ width: 18 + "rem" }}>
        <div className="card-header" style={{ color: 'navy', fontSize: '24px' }}>{ocena.ocena}</div>
        <div className="card-body">
          <h5 className="card-title">{ocena.predmet}</h5>
          <p className="card-text">{ocena.datum}</p>
          <p className="card-text">{ocena.opis}</p>
        </div>
      </div>
    </div>
  )
}

export default OcenaView
