<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/home-page.css') }}">
    <style>/* Base Styles */
        body {
          font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
          background-color: #f9f9f9;
          color: #333;
          line-height: 1.6;
        }
        
        h2, h3, h4 {
          color: #007BFF;
          margin-bottom: 0.5rem;
        }
        
        a {
          color: #007BFF;
          text-decoration: none;
        }
        a:hover {
          text-decoration: underline;
        }
        
        /* Hero Section */
        .launchnest-hero {
          background: #ffffff;
          padding: 3rem 2rem;
          text-align: center;
          box-shadow: 0 0 10px rgba(0,0,0,0.05);
          margin-bottom: 3rem;
        }
        
        .launchnest-hero p {
          max-width: 700px;
          margin: 0 auto 1rem auto;
          font-size: 1.1rem;
        }
        
        .launchnest-hero ul {
          list-style: none;
          padding: 0;
          margin: 1rem auto;
          max-width: 600px;
        }
        .launchnest-hero li {
          padding: 0.5rem 0;
          font-size: 1rem;
        }
        
        /* Button */
        .btn-primary {
          display: inline-block;
          background-color: #007BFF;
          color: white;
          padding: 0.7rem 1.5rem;
          margin-top: 1rem;
          border: none;
          border-radius: 8px;
          font-size: 1rem;
          transition: background 0.3s;
        }
        .btn-primary:hover {
          background-color: #0056b3;
        }
        
        /* Openings Section */
        .openings-section {
          padding: 2rem;
          background: #fff;
          box-shadow: 0 0 10px rgba(0,0,0,0.05);
          margin-bottom: 3rem;
          background-image: url('{{ asset('images/back.jpg') }}');
          background-size: cover;
          background-position: center;
          box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        .openings-section::before {
  content: "";
  position: absolute;
  top: 0; left: 0; right: 0; bottom: 0;
  backdrop-filter: blur(4px); /* slight blur */
  background-color: rgba(255,255,255,0.6); /* soft overlay */
  z-index: -1;
}
        
        .openings-grid {
          display: grid;
          grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
          gap: 1.5rem;
          margin-top: 1.5rem;
        }
        
        .opening-card {
          background: #f5faff;
          border: 1px solid #dceeff;
          border-radius: 10px;
          overflow: hidden;
          transition: transform 0.2s ease;
        }
        .opening-card:hover {
          transform: translateY(-5px);
        }
        
        .opening-card img {
          width: 100%;
          height: 160px;
          object-fit: cover;
        }
        
        .card-details {
          padding: 1rem;
        }
        .card-details h4 {
          margin-bottom: 0.5rem;
        }
        .card-details p {
          margin: 0.2rem 0;
        }
        
        .more-link {
          text-align: center;
          margin-top: 1.5rem;
          font-weight: bold;
        }
        
        .announcements-section {
  padding: 3rem 2rem;
  background-color: #f9fbfd;
}

.announcements-header {
  text-align: center;
  margin-bottom: 2rem;
}

.announce-container {
  display: flex;
  flex-wrap: wrap;
  gap: 2rem;
  justify-content: center;
}

.announcement {
  background: #ffffff;
  border-radius: 12px;
  box-shadow: 0 0 12px rgba(0,0,0,0.06);
  overflow: hidden;
  display: flex;
  flex-direction: column;
  max-width: 350px;
  transition: transform 0.3s ease;
}

.announcement:hover {
  transform: translateY(-5px);
}

.announcement img {
  width: 100%;
  height: 180px;
  object-fit: cover;
}

.announcement-content {
  padding: 1rem;
}

.announcement-content h4 {
  margin-top: 0;
  font-size: 1.1rem;
  color: #2c3e50;
}

.announcement-content p {
  font-size: 0.95rem;
  color: #555;
  line-height: 1.4;
}

        </style>
    <div class="home-page">

        <section class="home-section">
            <h1>Your Career Journey Starts Here!</h1>
            <h3>Fuel Your Journey. Find Your Nest.</h3>
            <div class="scroll-arrow" id="scrollArrow">
                <!-- Arrow SVG -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="none" stroke="currentColor" stroke-width="2" d="M12 4v16m0 0l-4-4m4 4l4-4" />
                </svg>
            </div>
        </section>

  <!-- LaunchNest Overview Section -->
<section class="launchnest-hero">
    <div class="hero-content">
      <h2>Welcome to LaunchNest 🚀</h2>
      <p>We’re a nonprofit platform built to help students in tech land real-world experience. 
        From job listings and forums to personalized support and resources — LaunchNest is your launchpad to a better future.</p>
      <ul>
        <li>💼 Explore internship & job opportunities</li>
        <li>📚 Access curated learning resources</li>
        <li>💬 Post and join technical forums</li>
        <li>🤖 Get help from our AI-powered chatbox</li>
      </ul>
      <a href="/joblisting" class="btn-primary">View Opportunities</a>
    </div>
  </section>
  
  <!-- Tech Forums Section -->
<section class="openings-section">
    <h3>Connect & Grow Through Tech Forums</h3>
    <p style="max-width: 700px; margin-bottom: 2rem;">
      Join a vibrant community of tech learners and professionals. Our forums make it easy to ask questions, share insights, and collaborate on real-world challenges. Whether you're looking for advice, mentorship, or just want to connect — the conversation starts here.
    </p>
    <div class="more-link">
      <a href="/discussion">Explore the Forums &gt;</a>
    </div>
  </section>
  
  
  <!-- Announcements Section -->
  <section class="announcements-section">
    <div class="announcements-header">
      <h2>🌍 Global Tech News</h2>
      <p>Stay up to date with the latest buzz from the world of technology, startups, and innovation.</p>
    </div>
    <div class="announce-container">
      <div class="announcement">
        <img src="{{ asset('images/elon.jpg') }}" alt="Tech News Image">
        <div class="announcement-content">
          <h4>Elon Musk’s xAI Releases Open-Source Grok</h4>
          <p>xAI, Elon Musk’s AI company, has open-sourced Grok, their chatbot challenger to ChatGPT. Developers are exploring its training methods and capabilities.</p>
        </div>
      </div>
  
      <div class="announcement">
        <img src="{{ asset('images/ai.jpg') }}" alt="AI Image">
        <div class="announcement-content">
          <h4>AI Revolutionizing Healthcare Diagnostics</h4>
          <p>New AI models can detect early-stage cancer with higher accuracy than traditional screening methods, ushering in a new era of predictive medicine.</p>
        </div>
      </div>
  
      <div class="announcement">
        <img src="{{ asset('images/startup.jpg') }}" alt="Startup News">
        <div class="announcement-content">
          <h4>Startup Boom in Africa’s Tech Scene</h4>
          <p>From fintech to edtech, Africa’s tech startups are drawing global investor attention. Lagos, Nairobi, and Addis Ababa are emerging as key hubs.</p>
        </div>
      </div>
    </div>
  </section>
  
  
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta/dist/vanta.waves.min.js"></script>
    <script src="{{ asset('js/profile.js') }}"></script>
    <script>
        let lastScrollTop = 0; // Keeps track of the last scroll position
        const arrow = document.getElementById('scrollArrow');

        // Function to show/hide the arrow based on scroll direction
        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > lastScrollTop) {
                // Scrolling down
                arrow.style.opacity = '0'; // Hide arrow
            } else {
                // Scrolling up
                arrow.style.opacity = '1'; // Show arrow
            }
            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // For Mobile or negative scrolling
        });
    </script>
</x-app-layout>
