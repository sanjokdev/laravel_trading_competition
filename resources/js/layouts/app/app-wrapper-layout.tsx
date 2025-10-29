

export default function AppWrapper({ children, }: { children: React.ReactNode;  }) {
    return (
        <div className="relative flex size-full min-h-screen flex-col bg-[#101a23] dark group/design-root overflow-x-hidden" >
            <header className="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-[#21364a] px-10 py-3">
                <div className="flex items-center gap-4 text-white">
                    <div className="size-4">
                        <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M44 4H30.6666V17.3334H17.3334V30.6666H4V44H44V4Z" fill="currentColor"></path></svg>
                    </div>
                    <h2 className="text-white text-lg font-bold leading-tight tracking-[-0.015em]">React MT4 Leaderboard APP</h2>
                </div>
                <div className="flex flex-1 justify-end gap-8">
                    <div className="flex items-center gap-9">
                        <a className="text-white text-sm font-medium leading-normal" href="#"></a>
                        <a className="text-white text-sm font-medium leading-normal" href="#"></a>
                        <a className="text-white text-sm font-medium leading-normal" href="#"></a>
                    </div>

                    <div className="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10"></div>
                </div>
            </header>
            <div className="px-40 flex flex-1 justify-center py-5">
                <div className="layout-content-container flex flex-col max-w-[960px] flex-1">
                    <div className="px-4 py-3 @container">
                        {children}
                    </div>
                </div>
            </div>

        </div>
    );
}
