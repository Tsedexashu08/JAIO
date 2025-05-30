<x-app-layout>


    <div class="resource-list">
        <h1>All your curiosity and information in one place</h1>

        @if (auth()->user()->hasAllRoles('Admin') || auth()->user()->hasAllRoles('Admin'))
            <a href="{{ route('admin.addresource') }}"><button class="button">Add-Resource</button></a>
        @endif
        {{-- <h1>Role:{{auth()->user()->hasAllRoles("Admin")}}</h1> --}}
        <section class="courses">
            <div class="uploaded course-list-container">
                <h1 style="font-weight: bold; ">Uploaded Resources</h1>
                <div class="course-list">
                    @foreach ($resources as $resource)
                        <div class="course-item">


                            @if ($resource->linkorfile === 'link')
                                {{-- Embedded YouTube video --}}

                                <iframe class="w-full aspect-video" src="{{ $resource->link }}" frameborder="0"
                                    allowfullscreen>
                                </iframe>
                            @elseif($resource->linkorfile === 'file')
                                {{-- Uploaded video file --}}
                                <video class="" style="border-radius: 10px;" controls>
                                    <source src="{{ asset('storage/' . $resource->file_path) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @elseif($resource->linkorfile === 'pdf')
                                @if (pathinfo($resource->file_path, PATHINFO_EXTENSION) == 'pdf' ||
                                        pathinfo($resource->file_path, PATHINFO_EXTENSION) == 'docx')
                                    <div class="course-image"><img style="width: 15vw;" src="{{ asset('images/pdf.png') }}" alt="">
                                    </div>
                                   
                                @endif
                            @endif
                            <div style="display: flex; gap:3vw; padding-left: 5vw;">
                                <div style=" width:fit-content">
                                    <p style="font-weight:bold;">{{ $resource->title }}</p>
                                    <p style="width:20vw; ">{{ $resource->description }}</p>
                                    
                                    
                                </div>
                                <div style="display:flex; flex-direction: column;">
                                @if (auth()->user()->hasAllRoles('Admin') || auth()->user()->hasAllRoles('Faculty'))
                                    {{-- Delete Button --}}
                                    <form action="{{ route('resource.destroy', $resource->resource_id) }}"
                                        method="POST" class="mt-4">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Are you sure you want to delete this resource?')"
                                            style="width:fit-content; padding-right:3vw; border:none; background-color: transparent;">
                                            <svg viewBox="0 0 16 16" class="bi bi-trash3-fill" fill="currentColor"
                                                height="18" width="18" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                                @if($resource->linkorfile === 'pdf'||$resource->linkorfile === 'file')
                                    <a href="{{{asset('storage/'.$resource->file_path)}}}" style="margin-left:-0.5vw;" download class="download" >
                                        <svg width="38"  height="65" viewBox="0 0 78 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M39 43.3333L22.75 29.7917L27.3 25.8646L35.75 32.9062V10.8333H42.25V32.9062L50.7 25.8646L55.25 29.7917L39 43.3333ZM19.5 54.1667C17.7125 54.1667 16.1823 53.6363 14.9094 52.5755C13.6365 51.5148 13 50.2396 13 48.75V40.625H19.5V48.75H58.5V40.625H65V48.75C65 50.2396 64.3635 51.5148 63.0906 52.5755C61.8177 53.6363 60.2875 54.1667 58.5 54.1667H19.5Z" fill="#1D1B20"/>
                                        </svg>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


            </div>



            <h1>Free Courses found online</h1>

            {{-- <button class="scroll-button left" onclick="scrollCourses(-1)">&#10094;</button> --}}
            <div class="course-list-container">
                <div class="course-list">


                    <div class="course-item">
                        <iframe width="853" height="480" src="https://www.youtube.com/embed/K5KVEU3aaeQ"
                            title="Python Full Course for Beginners [2025]" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        <p>Python Full Course for Beginners [2025]</p>
                        <p>2 hours</p>

                    </div>

                    <div class="course-item">
                        <iframe width="853" height="480" src="https://www.youtube.com/embed/un6ZyFkqFKo"
                            title="Go Programming – Golang Course with Bonus Projects" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        <p>Go Programming – Golang Course with Bonus Projects</p>
                        <p>9 hour video</p>
                    </div>
                    <div class="course-item">
                        <iframe width="853" height="480" src="https://www.youtube.com/embed/dCLhUialKPQ"
                            title="React JS 19 Full Course 2025 | Build an App and Master React in 2 Hours"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        <p>React JS 19 Full Course 2025</p>
                        <p>2 hours</p>
                    </div>
                </div>
            </div>
            {{-- <button class="scroll-button right" onclick="scrollCourses(1)">&#10095;</button> --}}
        </section>
        <section class="tips">
            <h1>Tips for getting that dream job</h1>
            <div class="course-list">
                <div class="course-item">
                    <iframe width="473" height="480" src="https://www.youtube.com/embed/1t1_a1BZ04o"
                        title="How to NOT Fail a Technical Interview" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

                    <p>How to NOT Fail a Technical Interview</p>
                    <p>8 minutes</p>
                </div>
                <div class="course-item">
                    <iframe width="853" height="480" src="https://www.youtube.com/embed/fQW6-2yfsBY"
                        title="How To Pass Coding Interviews Like the Top 1%" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <p>How To Pass Coding Interviews Like the Top 1%</p>
                    <p>7 minutes</p>
                </div>
                <div class="course-item">
                    <iframe width="853" height="480" src="https://www.youtube.com/embed/y4uBUxyzmAg"
                        title="Interview Tips in Amharic" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <p>Interview Tips in Amharic</p>
                    <p>8 minutes</p>
                </div>
            </div>
        </section>
    </div>



</x-app-layout>
<style>
    .resource-list {
        padding: 20px;
    }

    .courses,
    .tips {
        margin-bottom: 20px;
        padding: 0 20px;
        /* Add some padding for better spacing */
        position: relative;
        /* Required for scroll buttons */
    }

    .course-list-container {
        overflow-x: auto;
        /* Enable horizontal scrolling only when needed */
    }

    .course-list {
        display: flex;
        /* Ensure items are displayed in flex */
        flex-wrap: wrap;
        /* Allow wrapping for responsiveness */
        justify-content: center;
        /* Center items */
    }

    .course-item {
        text-align: center;
        flex: 0 1 calc(33.33% - 20px);
        /* Responsive width for each course item */
        height: 350px;
        /* Increased height for vertical appearance */
        margin: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        /* Create a shadow for better separation */
        border-radius: 8px;
        /* Adding rounded corners */
        padding: 15px;
        /* Adjusting padding */
        background-color: #fff;
        /* Adding background color for better contrast */
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        /* Align content to the top */
        transition: transform 0.3s ease, background-color 0.3s ease;
        /* Add transition for smooth movement and color change */
        border: 2px solid #d8bfd8;
        /* Light purple border */
        overflow: hidden;
        /* Ensure content does not overflow*/
    }

    .course-item:hover {
        transform: translateY(-10px);
        /* Move item up on hover */
        background-color: #00008B;
        /* Dark blue color on hover */
        color: #fff;
        /* Change text color to white */
    }

    iframe {
        width: 400px;
        /* Adjusted width */
        height: 300px;
        /* Adjusted height */
        background-color: #ccc;
        margin-bottom: 10px;
        border-radius: 8px;
        /* Matching image corners with container */
        transition: transform 0.3s ease;
        /* Add transition for smooth scaling */
    }

    h1 {
        font-size: 1.8em;
        /* Default font size for larger screens */
        text-align: center;
        margin: 0;
        /* Remove default margin */
        padding: 0;
        color: #007BFF;
        /* Remove default padding */
    }

    h2 {
        font-size: 1.2em;
        text-align: center;
        margin-bottom: 20px;
    }

    .course-item p {
        margin-top: 10px;
        /* Add space above the text */
        width: 100%;
        /* Ensure text fits within the box */
        word-wrap: break-word;
        /* Ensure text wraps within the box */
        overflow: hidden;
        /* Ensure text does not overflow */
        text-overflow: ellipsis;
        /* Add ellipsis for overflow text */
        white-space: normal;
        /* Allow text to wrap */
        text-align: center;
        /* Center-align the text */
    }

    .button {
        background-color: ;
        border-radius: 10px;
        width: 8vw;
        height: 6vh;
        transition: transform 0.3s ease, background-color 0.3s ease;
        /* Add transition for smooth movement and color change */
        border: 1px solid rgb(62, 100, 182);
        /* Light purple border */
        box-shadow: 0 4px 8px 4px rgba(0, 0, 0, 0.2);
        /* Create a shadow for better separation */


    }

    .button:hover {
        transform: 2s translateY(-2px);
        /* Move item up on hover */
        background-color: #00008B;
        /* Dark blue color on hover */
        color: #fff;
        /* Change text color to white */
        box-shadow: 0 4px 8px 4px rgba(23, 8, 226, 0.2);
        /* Create a shadow for better separation */

    }

    /* Media Queries for Responsive Design */
    @media (max-width: 1200px) {
        .course-item {
            flex: 0 1 calc(25% - 20px);
            /* Adjust width for larger screens */
            height: 300px;
            /* Adjust height for larger screens */
        }

        iframe {
            width: 90%;
            /* Adjusted image size */
            height: 90%;
        }

        h1 {
            font-size: 1.6em;
            /* Adjust font size */
        }

        h2 {
            font-size: 1.1em;
            /* Adjust font size */
        }
    }

    @media (max-width: 768px) {
        .course-item {
            flex: 0 1 calc(50% - 20px);
            /* Adjusting width to fit 2 items per row */
            height: 250px;
            /* Adjust height for smaller screens */
        }

        iframe {
            width: 90%;
            /* Adjusted image size */
            height: 90%;
        }

        h1 {
            font-size: 1.4em;
            /* Smaller font size for tablets */
        }

        h2 {
            font-size: 1em;
            /* Adjust font size */
        }

        button {
            width: fit-content;
        }
    }

    @media (max-width: 480px) {
        .course-item {
            flex: 0 1 calc(100% - 20px);
            /* Adjusting width to fit 1 item per row */
            height: auto;
            /* Adjust height for mobile devices */
        }

        .course-image {
            width: 200px;
            /* Adjusted image size */
            height: 200px;
            margin-bottom: 10px;
            /* Add space below the image */
        }

        h1 {
            font-size: 1em;
            /* Adjust font size for mobile devices */
        }

        h2 {
            font-size: 0.8em;
            /* Adjust font size for mobile devices */
        }

        .course-item p {
            font-size: 0.8em;
            /* Adjust font size for mobile devices */
        }
    }
</style>
