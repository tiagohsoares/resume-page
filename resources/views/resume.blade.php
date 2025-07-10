
<x-layout :title=" $resume->basics->name . ' Resume' ">
    <x-slot:header>
                        <h1 class="text-4xl font-bold text-gray-900">{{$resume->basics->name}}</h1>
                        <h2 class="text-xl font-semibold text-blue-700 mt-1">{{$resume->basics->label}} </h2>
                        <div class="flex flex-wrap gap-2 text-gray-700 mt-4">
                            @if (!empty($resume->basics->email))
                                <div>
                                    <a href="mailto:{{$resume->basics->email}}" class="hover: text-gray-700 mr-4">{{$resume->basics->email}}</a>
                                </div>
                            @endif
                    
                            @if (isset($resume->basics->location->city) && isset($resume->basics->location->region))
                                <div class="mb-3 text-gray-700"> 
                                    {{$resume->basics->location->city}}, {{$resume->basics->location->region}}
                                </div>
                            @endif
                        </div>

            @if (isset($resume->basics->profiles))
                <div class="mt-1 flex flex-wrap">
                    @foreach ( $resume->basics->profiles as $profiles )
                            <a href="{{$profiles->url}}" class="px-3 py-1.5 bg-white rounded-full shadow-sm text-sm hover:underline text-gray-700">{{$profiles->network}}</a>
                    @endforeach
                </div>
            @endif
            

            @if(isset($resume->basics->summary))
            <div>
                <p class="mt-6 text-gray-700 ">{{$resume->basics->summary}}</p>
            </div>
            @endif
    </x-slot:header>

            <section class="mt-10">
                <h2 class="text-2xl font-semibold border-b border-gray-200 pb-2 mb-4">Work Experience</h2>
                <div class="space-y-6">
                    @foreach ($resume->work as $work)
                        <div class="bg-white p-5 rounded-lg shadow-sm">
                            @if (isset($work->position) && isset($work->name))
                                <div class="flex flex-row justify-between">
                                    <h3 class= "text-2xl font-semibold text-gray-800"> {{$work->position}} at {{$work->name}}</h3>
                                    @endif
                                
                                @if(!empty($work->startDate))
                                    <div class="text-gray-600 text-sm mt-1">
                                        {{$work->startDate->format("M Y")}} - {{$work->endDate ? $work->endDate->format("M Y") : "Atual" }}
                                    </div>
                                </div>
                            @endif

                        <div class="mt-2">
                            <a href="{{$work->url}}" class="mt-4 text-sm hover:underline text-blue-600"> {{$work->url}}</a>
                            <p class="mt-2 text-base">{{$work->summary}}</p>
                            @if(!empty($work->highlights))
                                <ul class="list-disc list-outside mt-2 space-y-0.5 ml-4">
                                    @foreach($work->highlights as $highlights)
                                        <div class="flex-wrap flex justify-beetween gap-4">
                                            <li class="pl-5">{{$highlights}}</li>
                                        </div>
                                    @endforeach
                                </ul>
                            @endif
                            </div>
                        </div>
                    @endforeach
                    
            <section class="mt-10">
                <h2 class="text-2xl font-semibold border-b border-gray-200 pb-2 mb-4">Skills</h2>
                <div class="space-y-6 flex flex-wrap justify-between gap-4 mx-2">
                    @foreach ($resume->skills as $skills )
                        <div class="flex flex-wrap bg-white p-5 shadow-sm rounded-lg w-full md:w-1/2 px-2 mb-4">
                            <div class="flex justify-between items-center w-full mb-2">
                                @if(!empty($skills->name))
                                    <h3 class="pl-2 text-lg font-semibold text-gray-700">{{$skills->name}}</h3>
                                @endif

                                @if($skills->level)
                                    <div class="text-sm mt-0">
                                        <span class="ml-7 inline-block items-center rounded-md bg-blue-100 px-2 py-1 font-medium text-blue-700 ring-1 ring-blue-700/10">{{$skills->level}}</span>
                                    </div>
                                @endif
                                </div>

                                @if($skills->keywords)
                                <div class="mt-2 flex flex-wrap gap-2">
                                    @foreach ($skills->keywords as $keywords)
                                        <span class="ml-1 inline-block items-center rounded-sm bg-gray-100 px-2 py-1 font-medium text-gray-700">{{$keywords}}</span>
                                    @endforeach   
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>


            <section class="mt-10">
            <h2 class="text-2xl font-semibold border-b border-gray-200 pb-2 mb-4">Projects</h2>
                    @foreach ($resume->projects as $projects)
                        <div class="bg-white p-5 shadow-sm rounded-lg">
                            <div class="flex flex-row-2 justify-between gap-6">
                                @if ($projects->name)
                                        <h3 class="text-2xl font-semibold text-gray-800">{{$projects->name}}</h3>                                
                                @endif
                                @if($projects->startDate)
                                    <div class="text-sm text-gray-600 mt-1">
                                        {{$projects->startDate->format("M Y")}} - {{$projects->endDate ? $projects->endDate->format("M Y") : "Atual" }}
                                    </div>
                                @endif
                            </div>
                                
                            @if (!empty($projects->url))
                                <div class="mt-4">
                                    <a href="{{$projects->url}}" class="text-blue-500 hover:underline text-sm">{{$projects->url}}</a>
                                </div>
                            @endif

                            @if (!empty($projects->description))
                                <h3 class="text-base text-gray-800 mt-2">{{$projects->description}}</h3>
                            @endif
                            @if (!empty($projects->highlights))
                                <ul class="list-disc list-outside mt-2 space-y-0.5 ml-4">
                                    @foreach ($projects->highlights as $highlights)
                                        <div class="flex-wrap flex justify-beetween gap-4 text-gray-700">
                                            <li class="pl-5">{{$highlights}}</li>
                                        </div>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endforeach
            </section>
</x-layout>