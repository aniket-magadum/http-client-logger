import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom/client";
import axios from "axios";

function LogSearch() {
  const [logs, setLogs] = useState([]);

  const [batch, setBatch] = useState('');

  useEffect(() => {
    // Update the document title using the browser API
    axios.get("/http-client-logs").then(function (response) {
      setLogs(response.data);
    });
  }, []);

  function handleKeyDown(event)
  {
      if (event.key === 'Enter') {
        axios.get("/http-client-logs?batch="+batch).then(function (response) {
          setLogs(response.data);
        });
        history.push('/dresses?color=blue')
      }
  }

  const handleChange = (event) => {
    setBatch(event.target.value);
  };

  return (
    <div className="container mt-5 text-center">
      <input type="text" placeholder="Enter Batch" className="border p-2 mx-auto" onKeyDown={handleKeyDown} onChange={handleChange}/>
      <table className="table-auto border mx-auto mt-5">
        <thead className="font-bold border">
          <tr className="border p-2">
            <td className="border p-2">Batch</td>
            <td className="border p-2">Method</td>
            <td className="border p-2">URL</td>
            <td className="border p-2">Status Code</td>
            <td className="border p-2">Duration</td>
          </tr>
        </thead>
        <tbody>
          {logs.map((log) => (
            <tr key={log.uuid}>
              <td className="border p-2">{log.batch}</td>
              <td className="border p-2">{log.method}</td>
              <td className="border p-2">{log.url}</td>
              <td className="border p-2">{log.status_code}</td>
              <td className="border p-2">{log.response_time}</td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
}
export default LogSearch;
// DOM element

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
  axios.defaults.headers.common["X-CSRF-TOKEN"] = token.content;
}

const root = ReactDOM.createRoot(document.getElementById("http-client-logs"));
root.render(
  <React.StrictMode>
    <LogSearch />
  </React.StrictMode>
);
