import { useEffect, useState } from 'react'

export default function App() {
  const [status, setStatus] = useState('loading...')

  useEffect(() => {
    fetch(`${import.meta.env.VITE_API_URL}/ping`)
      .then((r) => r.json())
      .then((d) => setStatus(d.status))
      .catch(() => setStatus('API not reachable'))
  }, [])

  return <h1 className="p-8 text-2xl font-bold">API status: {status}</h1>
}