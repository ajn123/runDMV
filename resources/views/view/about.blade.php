<x-layouts.app>

    <div class="divide-y divide-gray-200 dark:divide-gray-700">
        <div class="space-y-2 pb-8 pt-6 ">
            <h1 class="text-3xl font-extrabold leading-9 tracking-tight text-gray-900 dark:text-gray-100 sm:text-4xl sm:leading-10 md:text-6xl md:leading-14">
                About
            </h1>
        </div>
        <div class="items-start space-y-2 ">
            <div class="flex flex-col sm:flex-row items-center space-x-2 pt-8">
                <img src="{{asset('build/assets/MeRunning.png')}}" class="w-40 shadow-2xl h-40 mr-4 rounded-lg" alt="me running"/>

                <div class="flex flex-col">
                <h3 class="pb-2 pt-4 text-2xl font-bold leading-8 tracking-tight">{Alex Norton - Runner and Software Developer}</h3>
                <div class="text-gray-500 dark:text-gray-400">This is meant to be a free resource for run clubs and races in the DMV.</div>

                <div class="text-gray-500 dark:text-gray-400">Project was made with PHP, Laravel, Filament and deployed using Forge</div>

                <div class="text-gray-500 dark:text-gray-400">You can reach out to me at emailing</div>
                <div class="flex space-x-3 pt-6">
{{--                    <SocialIcon kind="mail" href={`mailto:${email}`} />--}}
{{--                    <SocialIcon kind="github" href={github} />--}}
{{--                    <SocialIcon kind="linkedin" href={linkedin} />--}}
{{--                    <SocialIcon kind="x" href={twitter} />--}}

                </div>
                </div>
            </div>
            <div class="prose max-w-none pb-8 pt-8 dark:prose-invert xl:col-span-2">=

            </div>
        </div>
    </div>


</x-layouts.app>
