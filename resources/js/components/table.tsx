
export default function Table ({ headers, body }) {

    return (

        <div className="flex overflow-hidden rounded-lg border border-[#2f4d6a] bg-[#101a23]">
            <table className="flex-1 text-white">
                <thead>
                <tr className="bg-[#182635]">
                    {headers.map((header, i) =>
                        <th key={i} className=" px-4 py-3 text-left text-white w-[400px] text-sm font-medium leading-normal">
                            {header}
                        </th>
                    )}
                </tr>
                </thead>
                <tbody>

                {body.map((entry, i) => <tr className="border-t border-t-[#2f4d6a]" key={entry.id}>
                    <td className="table-5231bd9c-538b-490f-adb2-2b965d94982a-column-120 h-[72px] px-4 py-2 w-[400px] text-white text-sm font-normal leading-normal">{i + 1}</td>
                    <td className="table-5231bd9c-538b-490f-adb2-2b965d94982a-column-120 h-[72px] px-4 py-2 w-[400px] text-white text-sm font-normal leading-normal">{entry.login_id}</td>
                    <td className="table-5231bd9c-538b-490f-adb2-2b965d94982a-column-120 h-[72px] px-4 py-2 w-[400px] text-white text-sm font-normal leading-normal">{entry.equity_percentage} % </td>
                </tr>)}

                </tbody>
            </table>
        </div>
    );
}
