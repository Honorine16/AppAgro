<style>
    /* Global styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      background-color: #f0f4f8;
    }

    /* Sidebar styles */
    #sidebar {
      width: 250px;
      height: 100vh;
      background-color: #28a745;
      position: fixed;
      top: 0;
      left: 0;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      padding: 20px;
      transition: transform 0.3s ease;
    }

    #sidebar h2 {
      color: white;
      margin-bottom: 1rem;
    }

    /* Menu item styles */
    .menu-item {
      display: flex;
      align-items: center;
      padding: 10px;
      color: #fff;
      text-decoration: none;
      margin-bottom: 1rem;
      transition: background-color 0.3s ease, color 0.3s ease;
      border-radius: 5px;
      font-size: 16px;
    }

    .menu-item svg {
      width: 20px;
      height: 20px;
      margin-right: 10px;
    }

    .menu-item:hover {
      background-color: #218838;
      color: #f0f4f8;
    }

    /* Footer logout */
    .logout {
      margin-top: auto;
      color: #fff;
      text-decoration: none;
      font-size: 16px;
      display: flex;
      align-items: center;
      transition: color 0.3s ease;
    }

    .logout:hover {
      color: #ffdddd;
    }

    .logout svg {
      width: 20px;
      height: 20px;
      margin-right: 10px;
    }

    #welcome-message {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: #ffffff;
      padding: 30px 50px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      text-align: center;
      font-size: 1.5em;
      color: #28a745;
      opacity: 0;
      animation: spinBounceExit 6s ease forwards;
      z-index: 1;
    }

    /* Enhanced animation for welcome message */
    @keyframes spinBounceExit {
      0% {
        opacity: 0;
        transform: scale(0) rotate(-360deg);
      }

      20% {
        opacity: 1;
        transform: scale(1.1) rotate(10deg);
      }

      40% {
        transform: scale(1);
      }

      50% {
        transform: translateY(-10px);
      }

      60% {
        transform: translateY(0);
      }

      80% {
        opacity: 1;
      }

      100% {
        opacity: 0;
        transform: translateY(-50px);
      }
    }


    /* Responsive styling */
    @media (max-width: 768px) {
      #sidebar {
        width: 200px;
      }

      #welcome-message {
        font-size: 1.2em;
        padding: 15px 30px;
      }

      .menu-item {
        font-size: 14px;
        padding: 8px;
      }
    }

    @media (max-width: 576px) {
      #sidebar {
        width: 100%;
        height: auto;
        position: static;
        flex-direction: row;
        flex-wrap: wrap;
      }

      #sidebar h2 {
        font-size: 1em;
        text-align: center;
        flex-basis: 100%;
        margin-bottom: 10px;
      }

      .menu-item {
        font-size: 14px;
        padding: 8px;
        flex: 1 1 100%;
        text-align: center;
        margin-bottom: 5px;
      }

      #welcome-message {
        font-size: 1em;
        padding: 10px 20px;
        top: 30%;
      }
    }
  </style>
<div>
    <div id="sidebar">
  <h2>Bienvenue {{ Auth::user()->name }}</h2>
  <div>
    <a href="#" class="menu-item">
      <svg viewBox="0 0 24 24" fill="currentColor">
        <path d="M12 0a12 12 0 1 0 12 12A12 12 0 0 0 12 0Zm0 22a10 10 0 1 1 10-10A10 10 0 0 1 12 22Z" />
      </svg>
      Dashboard
    </a>
    <a href="{{ route('menus.diagnostic') }}" class="menu-item">
      <svg viewBox="0 0 24 24" fill="currentColor">
        <path d="M19.65 6.34 17.9 8.09a6 6 0 1 1-8.48 0L4.34 3.89a10 10 0 1 0 15.31 2.45Z" />
      </svg>
      Diagnostic
    </a>
    <a href="{{ route('menus.weather') }}" class="menu-item">
      <svg viewBox="0 0 24 24" fill="currentColor">
        <path d="M3.87 15.13A5.08 5.08 0 0 1 7 6.13a5.08 5.08 0 1 1 3.13 7.25A3.25 3.25 0 0 1 6.5 15.5H4.5a1.37 1.37 0 0 1-1-2.37Z" />
      </svg>
      Météo
    </a>
    <a href="{{ route('menus.list') }}" class="menu-item">
      <svg viewBox="0 0 24 24" fill="currentColor">
        <path d="M6 2a4 4 0 0 0-4 4v12a4 4 0 0 0 4 4h12a4 4 0 0 0 4-4V6a4 4 0 0 0-4-4Zm7.5 15a3 3 0 1 1 3-3 3 3 0 0 1-3 3ZM5 7a2 2 0 1 1 2-2 2 2 0 0 1-2 2Z" />
      </svg>
      Discussions
    </a>
    <a href="{{ route('menus.advice') }}" class="menu-item">
      <svg viewBox="0 0 24 24" fill="currentColor">
        <path d="M12 2a10 10 0 1 1-10 10A10 10 0 0 1 12 2Zm0 18a8 8 0 1 0-8-8 8 8 0 0 0 8 8Z" />
      </svg>
      Conseils Agronomiques
    </a>
    <a href="{{ route('menus.formation') }}" class="menu-item">
      <svg viewBox="0 0 24 24" fill="currentColor">
        <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0Zm6 18H6v-2h12Zm0-4H6v-2h12Zm0-4H6V8h12Z" />
      </svg>
      Formation
    </a>
  </div>

  <!-- Logout -->
  <a href="{{ route('login') }}" class="logout">
    <svg viewBox="0 0 24 24" fill="currentColor">
      <path d="M17 21v-4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v4H5v-4a4 4 0 0 1 4-4h6a4 4 0 0 1 4 4ZM5 4h3a1 1 0 0 1 1 1v3H4V4ZM4 20h5v-4H4v4ZM4 7h5V5H4Z" />
    </svg>
    Déconnexion
  </a>
</div>
</div>
