import React from 'react';
import { Navigate, Outlet } from 'react-router-dom';
import { useStateContext } from '../context/ContextProvider';


const DefaultLayout = ({ children }) => {
  const { token } = useStateContext();

  if (!token) {
    return <Navigate to="/pocetna" />;
  }

  return (
    
    <div>

      <div>
        {children} 
        <Outlet/>
      </div>
   
    </div>

  );
};

export default DefaultLayout;
