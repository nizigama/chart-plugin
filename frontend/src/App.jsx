import {useState} from 'react'
import {
    LineChart,
    ResponsiveContainer,
    Legend, Tooltip,
    Line,
    XAxis,
    YAxis,
    CartesianGrid
} from 'recharts';

function App() {

    const [selectedValue, setSelectedValue] = useState('');
    const [pdata, setpData] = useState([
        {
            name: 'MongoDb',
            uv: 11,
            pv: 120
        },
        {
            name: 'Javascript',
            uv: 15,
            pv: 12
        },
        {
            name: 'PHP',
            uv: 5,
            pv: 10
        },
        {
            name: 'Java',
            uv: 10,
            pv: 5
        },
        {
            name: 'C#',
            uv: 9,
            pv: 4
        },
        {
            name: 'C++',
            uv: 10,
            pv: 8
        },
    ]);

    const handleOptionSelected = async (event) => {
        setSelectedValue(event.target.value)

        try {
            const res = await fetch("/wp-json/my_graph_plugin/v1/data")

            const data = await res.json()

            setpData(data)

        } catch (err) {
            alert(err)
        }
    }

    return (
        <>
            <div style={{display: 'flex', justifyContent: 'space-between'}}>
                <h4 className="text-heading" style={{display: 'inline-block'}}>
                    Languages
                </h4>
                <select value={selectedValue} onChange={handleOptionSelected}>
                    <option value="seven">7 days</option>
                    <option value="fifteen">15 days</option>
                    <option value="one">1 month</option>
                </select>
            </div>
            <ResponsiveContainer width="100%" aspect={2}>
                <LineChart data={pdata}>
                    <CartesianGrid/>
                    <XAxis dataKey="name"
                           interval={'preserveStartEnd'}/>
                    <YAxis></YAxis>
                    <Legend/>
                    <Tooltip/>
                    <Line dataKey="uv"
                          stroke="black" activeDot={{r: 8}}/>
                    <Line dataKey="pv"
                          stroke="red" activeDot={{r: 8}}/>
                </LineChart>
            </ResponsiveContainer>
        </>
    )
}

export default App
