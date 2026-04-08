import React from "react";
import { Outlet, useNavigate } from "react-router-dom";
import { useStateContext } from "../context/ContextProvider";

export default function GuestLayout() {
  const { token, role } = useStateContext();
  const navigate = useNavigate();

  const handleClickLogin = () => {
    if (token && role) {
      debugger;
      switch (role) {
        case "Ucenik":
          navigate("/home-ucenik");
          break;
        case "Profesor":
          navigate("/home-profesor");
          break;
        case "Roditelj":
          navigate("/home-roditelj");
          break;
    
      }
    }
  };

  if (token) {
    return <Outlet />;
  }

  return (
    <div style={{ height: '100vh' }}>
      <Outlet />
    
    </div>
  );
}
