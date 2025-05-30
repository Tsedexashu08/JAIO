<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/discussion-forum-page.css') }}">
    <div class="forum-page">
        <div class="forum-header">
            <h1>Welcome to LaunchNet's Discussion Forum</h1>
            <p id="intro" >Ask questions, share your knowledge and experience, and learn from others.</p>
            <p id="results-count"></p>
            <div class="forum-search">
                <input type="text" placeholder="Search for a topic">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </button>
            </div>

            <div class="add-post">
                <span>
                    <img src="{{ asset('images/forum-post.png') }}" alt="">
                </span>
                <section>
                    <h2>Start a new discussion</h2>
                    <p>Have a topic you would like to discuss or ask questions, share your knowledge and experience, and
                        learn from others.</p>
                </section>
                <button
                    style="display: flex; align-items: center; gap:1%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">
                    Add Post
                    <svg fill="#ffffff" height="24px" width="24px" version="1.1" id="Layer_1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 210 256" xml:space="preserve" style="margin-left: 10px;">
                        <path
                            d="M75.7,66.3H36.8V55.9h38.9V66.3z M126,55.9H91.7v35.1H126V55.9z M208,254h-80l-31.5-18.1h35.6v-6.3H21l0,0 c-10.2-1.9-19-11-19-21.6V25C2,12.6,12.6,2,25,2h113c11.7,0,21,9.3,21,21v115h6.4c4.2,0,7.8,2.5,9.2,6.5L208,254z M87.7,214.6 c0-3.2-2.4-5.6-5.6-5.6c-3,0-5.6,2.6-5.6,5.6c0,3.2,2.4,5.6,5.6,5.6C85.2,220.2,87.5,217.8,87.7,214.6z M144.2,158h-18.9 c-5.5,0-10-4.5-10-10s4.5-10,10-10H144V31H18v169h126.2V158z M108.8,133.9H36.8v11.3h72.1V133.9z M126.7,162.3H37.4v11.3h89.2V162.3 z M75.7,80.7H36.8v10.4h38.9V80.7z M126,105.5H36.8v11.3H126V105.5z" />
                    </svg>
                </button>
            </div>
        </div>

        @include('components.add-post')

        <div class="forum-container">
            @foreach ($posts as $forum)
                <div class="forum-card">
                    <section id="forum-header">
                        <span>
                            @if (count($forum->posts) > 0)
                                <img src="{{ asset('storage/' . $forum->posts[0]->user->profilePicture) }}"
                                    alt="User Image" id="user-image" class="img-fluid">
                            @else
                                <img src="{{ asset('images/default-user.png') }}" alt="Default User Image"
                                    id="user-image" class="img-fluid" loading="lazy">
                            @endif
                        </span>
                        <span>
                            {{-- <span class="flex justify-end h-fit p-2 align-center">
                                <x-view-button />
                                <x-delete-button />
                            </span> --}}
                            @if (count($forum->posts) > 0)
                                <h1>{{ $forum->posts[0]->user->name }}</h1>
                                <b><span>{{ $forum->posts[0]->user->role }}</span></b>
                                <span id="posted-at"> - Posted at: {{ $forum->posts[0]->created_at }}</span>
                            @else
                                <span>No posts available.</span>
                            @endif
                        </span>
                    </section>

                    <section class="forum-content">
                        <h2>{{ $forum->topic }}</h2>
                        @foreach ($forum->posts as $forumPost)
                            <p>{{ $forumPost->content }}</p>
                            <div class="images">
                                @foreach ($forumPost->images as $image)
                                    <img src="{{ asset('storage/' . $image->image) }}" alt="Forum Image"
                                        id="forum-image" class="img-fluid" loading="lazy">
                                @endforeach
                            </div>

                            {{-- Comments and like section --}}
                            @foreach ($forum->posts as $forumPost)
                                @include('components.likes-and-comments', [
                                    'feedback' => $forumPost->feedback,
                                    'postId' => $forumPost->post_id,
                                    'likes' => $forumPost->likes,
                                    'comments' => count($forumPost->feedback),
                                ])
                            @endforeach
                        @endforeach
                    </section>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta/dist/vanta.waves.min.js"></script>
    <script src="{{ asset('js/forumpage.js') }}"></script>
    <script>
        document.querySelector('.add-post button').addEventListener('click', function() {
            const addpost = document.getElementById('popup-form');
            addpost.style.display = 'block';
        });
        document.querySelector('#close-button').addEventListener('click', function() {
            const addpost = document.getElementById('popup-form');
            addpost.style.display = 'none';
        });

        document.querySelector('.forum-search input').addEventListener('input', function() {
            const query = this.value.toLowerCase();
            const forumCards = document.querySelectorAll('.forum-card');
            let resultsCount = 0;

            forumCards.forEach(card => {
                const topic = card.querySelector('.forum-content h2').textContent.toLowerCase();
                if (topic.includes(query)) {
                    card.style.display = 'block';
                    resultsCount++;
                } else {
                    card.style.display = 'none';
                   
                }
            });
         
            document.getElementById('results-count').textContent = `${resultsCount} result(s) found`;
        });
    </script>
</x-app-layout>