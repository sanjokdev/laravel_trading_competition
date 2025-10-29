// import { type SharedData } from '@/types';
import AppWrapper from "@/layouts/app/app-wrapper-layout";
import { useEffect } from 'react';
import { Inertia } from '@inertiajs/inertia';
import { router } from '@inertiajs/react';
import Table from "@/components/table";

export default function Leaderboard({ leaderboardData }) {
    useEffect(() => {
        const interval = setInterval(() => {
            router.reload({only: ['leaderboardData'], preserveState: true});
            // Inertia.reload({ preserveState: true }); // safest method
        }, 1000); // refresh every minute

        return () => clearInterval(interval);
    }, []);
    return (

    <AppWrapper>
        <Table headers={["Position","Login","Equity"]} body={leaderboardData}/>

    </AppWrapper>
    );
}
