<style>
  .user-profile {
    min-height: 100vh;
    width: 100%;
    display: grid;
    grid-template-columns: 350px 1fr 1fr;
    grid-gap: 2.5rem;
    padding: 3rem;
    font-family: 'Inter', sans-serif;
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
  }
  
  .user-info {
    grid-row: span 2;
    display: flex;
    flex-direction: column;
    align-items: center;
    background: white;
    padding: 2rem;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }
  
  .profile-image {
    width: 350px;
    height: 300px;
    border-radius: 50%;
    margin-bottom: 1.5rem;
    object-fit: cover;
    border: 4px solid #fff;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
  }
  
  .user-name {
    font-size: 1.5rem;
    font-weight: 600;
    color: #2d3748;
    margin-bottom: 0.5rem;
  }
  
  .user-email {
    color: #718096;
    margin-bottom: 1.5rem;
  }
  
  .update-btn {
    background-color: #4f46e5;
    color: #fff;
    border: none;
    padding: 0.75rem 2rem;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 500;
    transition: all 0.2s ease;
  }
  
  .update-btn:hover {
    background-color: #4338ca;
    transform: translateY(-1px);
  }
  
  .user-properties,
  .companies {
    background-color: white;
    padding: 1.5rem;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }
  
  .user-properties h3,
  .companies h3 {
    color: #2d3748;
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 1.5rem;
    padding-bottom: 0.75rem;
    border-bottom: 2px solid #e2e8f0;
  }
  
  .user-properties table,
  .companies table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
  }
  
  .user-properties th,
  .user-properties td,
  .companies th,
  .companies td {
    padding: 1rem;
    border-bottom: 1px solid #e2e8f0;
    color: #4a5568;
  }
  
  .user-properties th,
  .companies th {
    text-align: left;
    font-weight: 600;
    color: #2d3748;
    background-color: #f7fafc;
  }
  
  .user-properties tr:last-child td,
  .companies tr:last-child td {
    border-bottom: none;
  }
  
  .user-properties tr:hover,
  .companies tr:hover {
    background-color: #f7fafc;
  }
</style>
<x-app-layout>
    <div class="user-profile">
        <div class="user-info">
          <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="{{ $user->name }}" class="profile-image">
          <h2 class="user-name">{{ $user->name }}</h2>
          <p class="user-email">{{ $user->email }}</p>
          <button class="update-btn">Update Profile</button>
        </div>
        <div class="user-properties">
          <h3>User Properties</h3>
          <table>
            <tr>
              <td>First Name:</td>
              <td>{{ $user->name }}</td>
            </tr>
            <tr>
              <td>Email:</td>
              <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <td>Role:</td>
                <td>{{ $user->getRoleNames()->first() }}</td>
            </tr>
          </table>
        </div>
        <div class="companies">
            <h3>Activity</h3>
            <table>
              <tr>
                <th>Jobs</th>
                <th>Roles</th>
                <th>Phases</th>
              </tr>
              <tr>
                <td>Ultimo LLC</td>
                <td>Admin</td>
                <td>4,162</td>
              </tr>
              <tr>
                <td>Dash-herman</td>
                <td>philosopher</td>
                <td>87</td>
              </tr>
            </table>
        </div>
        <div class="companies">
          <h3>Companies</h3>
          <table>
            <tr>
              <th>Jobs</th>
              <th>Roles</th>
              <th>Phases</th>
            </tr>
            <tr>
              <td>Ultimo LLC</td>
              <td>Admin</td>
              <td>4,162</td>
            </tr>
            <tr>
              <td>Dash-herman</td>
              <td>philosopher</td>
              <td>87</td>
            </tr>
          </table>
        </div>
    </div>
</x-app-layout>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanta/dist/vanta.waves.min.js"></script>
<script src="{{ asset('js/forumpage.js') }}"></script>
