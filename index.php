<?php
/**
 * Portfolio — Main Page
 * Computer Science Engineering Student Portfolio
 * Structure: Semantic HTML5 + PHP includes-ready single file
 */
$siteName = "Prasad kapse";
$siteRole = "Computer Science Engineering Student";
$userEmail = "pkapse9009@gmail.com";
$githubUrl = "https://github.com/prasadkapse";
$linkedinUrl = "https://linkedin.com/in/prasadkapse";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $siteName; ?> | Portfolio</title>
<meta name="description" content="Portfolio of <?php echo $siteName; ?>, a Computer Science Engineering student specializing in web development, Java, Python and PHP.">
<meta name="keywords" content="portfolio, computer science, web developer, java, python, php, student developer">
<meta name="author" content="<?php echo $siteName; ?>">

<!-- Open Graph -->
<meta property="og:title" content="<?php echo $siteName; ?> | Portfolio">
<meta property="og:description" content="Computer Science Engineering Student — Web Developer & Problem Solver">
<meta property="og:type" content="website">

<!-- Favicon -->
<link rel="icon" type="image/png" href="images/favicon.png">

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">

<!-- Stylesheets -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/animations.css">
<link rel="stylesheet" href="css/responsive.css">
</head>
<body>

<!-- ============ SCROLL PROGRESS BAR ============ -->
<div class="scroll-progress" id="scrollProgress"></div>

<!-- ============ NAVIGATION ============ -->
<header class="navbar" id="navbar">
  <nav class="nav-container">
    <a href="#home" class="nav-logo">
      <span class="logo-mark">PK</span>
      <span class="logo-text">Prasad</span>
    </a>

    <ul class="nav-links" id="navLinks">
      <li><a href="#home" class="nav-link active" data-section="home">Home</a></li>
      <li><a href="#about" class="nav-link" data-section="about">About</a></li>
      <li><a href="#skills" class="nav-link" data-section="skills">Skills</a></li>
      <li><a href="#education" class="nav-link" data-section="education">Education</a></li>
      <li><a href="#projects" class="nav-link" data-section="projects">Projects</a></li>
      <li><a href="#contact" class="nav-link" data-section="contact">Contact</a></li>
    </ul>

    <div class="nav-actions">
      <a href="assets/resume.pdf" class="btn btn-primary btn-sm" download>Resume</a>
      <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation menu" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
    </div>
  </nav>
</header>

<main>

  <!-- ============ HERO SECTION ============ -->
  <section class="hero" id="home">
    <div class="hero-bg-shape" aria-hidden="true"></div>
    <div class="container hero-container">
      <div class="hero-content fade-in-up">
        <p class="hero-greeting">👋 Hello, I'm</p>
        <h1 class="hero-name">Prasad kapse</h1>
        <p class="hero-role"><?php echo $siteRole; ?></p>
        <p class="hero-typing">I'm a <span class="typed-text" id="typedText"></span><span class="cursor">|</span></p>
        <p class="hero-desc">
          I design and build clean, functional digital experiences — turning
          logic into code and ideas into working software.
        </p>

        <div class="hero-buttons">
          <a href="#projects" class="btn btn-primary">View Projects</a>
          <a href="assets/resume.pdf" class="btn btn-secondary" download>Download Resume</a>
          <a href="#contact" class="btn btn-outline">Contact Me</a>
        </div>

        <div class="hero-socials">
          <a href="<?php echo $githubUrl; ?>" target="_blank" rel="noopener" aria-label="GitHub" class="social-icon">
            <svg viewBox="0 0 24 24" width="20" height="20"><path fill="currentColor" d="M12 .5C5.73.5.5 5.73.5 12c0 5.08 3.29 9.39 7.86 10.91.57.1.78-.25.78-.55v-2.14c-3.2.7-3.87-1.36-3.87-1.36-.53-1.33-1.29-1.69-1.29-1.69-1.05-.72.08-.71.08-.71 1.17.08 1.78 1.2 1.78 1.2 1.03 1.77 2.71 1.26 3.37.96.1-.75.4-1.26.73-1.55-2.55-.29-5.23-1.28-5.23-5.68 0-1.26.45-2.28 1.19-3.08-.12-.29-.52-1.46.11-3.04 0 0 .97-.31 3.18 1.18a11 11 0 0 1 5.79 0c2.2-1.49 3.17-1.18 3.17-1.18.64 1.58.24 2.75.12 3.04.74.8 1.19 1.82 1.19 3.08 0 4.41-2.69 5.38-5.25 5.67.41.36.78 1.07.78 2.16v3.2c0 .3.21.66.79.55A10.51 10.51 0 0 0 23.5 12c0-6.27-5.23-11.5-11.5-11.5Z"/></svg>
          </a>
          <a href="<?php echo $linkedinUrl; ?>" target="_blank" rel="noopener" aria-label="LinkedIn" class="social-icon">
            <svg viewBox="0 0 24 24" width="20" height="20"><path fill="currentColor" d="M20.45 20.45h-3.56v-5.57c0-1.33-.02-3.03-1.85-3.03-1.85 0-2.14 1.45-2.14 2.94v5.66H9.34V9h3.42v1.56h.05c.48-.9 1.64-1.85 3.38-1.85 3.61 0 4.28 2.38 4.28 5.47v6.27ZM5.34 7.43a2.07 2.07 0 1 1 0-4.13 2.07 2.07 0 0 1 0 4.13ZM7.12 20.45H3.56V9h3.56v11.45ZM22.22 0H1.77C.79 0 0 .77 0 1.73v20.54C0 23.23.79 24 1.77 24h20.45c.98 0 1.78-.77 1.78-1.73V1.73C24 .77 23.2 0 22.22 0Z"/></svg>
          </a>
          <a href="mailto:<?php echo $userEmail; ?>" aria-label="Email" class="social-icon">
            <svg viewBox="0 0 24 24" width="20" height="20"><path fill="currentColor" d="M2 4h20a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1Zm19 3.24-8.4 6.3a1 1 0 0 1-1.2 0L3 7.24V19h18V7.24ZM3.4 5l8.6 6.45L20.6 5H3.4Z"/></svg>
          </a>
        </div>
      </div>

      <div class="hero-visual fade-in-up delay-2">
        <div class="hero-blob" aria-hidden="true"></div>
        <div class="hero-card floating-card card-1">
          <span class="code-icon">&lt;/&gt;</span>
          <span>Clean Code</span>
        </div>
        <div class="hero-card floating-card card-2">
          <span class="code-icon">⚙</span>
          <span>Problem Solver</span>
        </div>
        <div class="hero-card floating-card card-3">
          <span class="code-icon">☕</span>
          <span>Java • Python • PHP</span>
        </div>
        <img src="images/hero-illustration.svg" alt="Developer illustration" class="hero-illustration" onerror="this.style.display='none'">
      </div>
    </div>

    <a href="#about" class="scroll-indicator" aria-label="Scroll down">
      <span></span>
    </a>
  </section>

  <!-- ============ ABOUT SECTION ============ -->
  <section class="about section" id="about">
    <div class="container">
      <p class="section-eyebrow fade-in-up">About Me</p>
      <h2 class="section-title fade-in-up">Get to know me a little better</h2>

      <div class="about-grid">
        <div class="about-text fade-in-up">
          <p>
            I'm <strong>Prasad Janardan Kapse</strong>, a Computer Science Engineering student
            with a strong passion for building software that solves real problems.
            My journey into programming started with curiosity and has grown into
            a genuine love for writing clean, efficient code.
          </p>
          <p>
            I enjoy working across the stack — from crafting responsive front-end
            interfaces with HTML, CSS and JavaScript, to building robust back-end
            logic with PHP, Java and Python. I'm constantly learning new
            technologies and looking for opportunities to apply my skills to
            meaningful projects.
          </p>
          <p>
            My career objective is to join a team where I can contribute as a
            software developer, keep growing technically, and eventually take on
            challenging engineering problems that create real impact.
          </p>

          <div class="about-highlights">
            <span class="highlight-pill">💻 Web Development</span>
            <span class="highlight-pill">💻 App Developer </span>
            <span class="highlight-pill">🧩 Problem Solving</span>
            <span class="highlight-pill">📚 Lifelong Learner</span>
          </div>
        </div>

        <div class="about-cards">
          <div class="info-card fade-in-up">
            <div class="info-icon">🎓</div>
            <h3>Education</h3>
            <p>B.Tech in Computer Science Engineering</p>
            <span class="info-sub">DBATU University, 2022 – 2026</span>
          </div>
          <div class="info-card fade-in-up delay-1">
            <div class="info-icon">🗣</div>
            <h3>Languages Known</h3>
            <p>Marathi English, Hindi</p>
            <span class="info-sub">Professional working proficiency</span>
          </div>
          <div class="info-card fade-in-up delay-2">
            <div class="info-icon">🚀</div>
            <h3>Projects Completed</h3>
            <p class="counter" data-target="4">0</p>
            <span class="info-sub">Personal & academic projects</span>
          </div>
          <div class="info-card fade-in-up delay-3">
            <div class="info-icon">🐙</div>
            <h3>GitHub Profile</h3>
            <a href="<?php echo $githubUrl; ?>" target="_blank" rel="noopener" class="info-link"><?php echo parse_url($githubUrl, PHP_URL_HOST) . parse_url($githubUrl, PHP_URL_PATH); ?> →</a>
            <span class="info-sub">Check out my repositories</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ SKILLS SECTION ============ -->
  <section class="skills section section-alt" id="skills">
    <div class="container">
      <p class="section-eyebrow fade-in-up">My Toolbox</p>
      <h2 class="section-title fade-in-up">Skills & Technologies</h2>
      <p class="section-subtitle fade-in-up">
        Languages and tools I use to design, build and ship software.
      </p>

      <h3 class="skills-group-title fade-in-up">Programming Languages</h3>
      <div class="skills-grid">
        <div class="skill-card fade-in-up">
          <div class="skill-icon" style="color:#E34F26">🌐</div>
          <h4>HTML5</h4>
          <div class="skill-bar"><span style="width:90%"></span></div>
        </div>
        <div class="skill-card fade-in-up">
          <div class="skill-icon" style="color:#2965F1">🎨</div>
          <h4>CSS3</h4>
          <div class="skill-bar"><span style="width:88%"></span></div>
        </div>
        <div class="skill-card fade-in-up">
          <div class="skill-icon" style="color:#F7DF1E">⚡</div>
          <h4>JavaScript</h4>
          <div class="skill-bar"><span style="width:82%"></span></div>
        </div>
        <div class="skill-card fade-in-up">
          <div class="skill-icon" style="color:#777BB4">🐘</div>
          <h4>PHP</h4>
          <div class="skill-bar"><span style="width:78%"></span></div>
        </div>
        <div class="skill-card fade-in-up">
          <div class="skill-icon" style="color:#EA2D2E">☕</div>
          <h4>Java</h4>
          <div class="skill-bar"><span style="width:80%"></span></div>
        </div>
        <div class="skill-card fade-in-up">
          <div class="skill-icon" style="color:#3776AB">🐍</div>
          <h4>Python</h4>
          <div class="skill-bar"><span style="width:85%"></span></div>
        </div>
        <div class="skill-card fade-in-up">
          <div class="skill-icon" style="color:#5C6BC0">🔤</div>
          <h4>C</h4>
          <div class="skill-bar"><span style="width:75%"></span></div>
        </div>
        <div class="skill-card fade-in-up">
          <div class="skill-icon" style="color:#00599C">➕</div>
          <h4>C++</h4>
          <div class="skill-bar"><span style="width:76%"></span></div>
        </div>
      </div>

      <h3 class="skills-group-title fade-in-up">Tools & Platforms</h3>
      <div class="skills-grid skills-grid-tools">
        <div class="skill-card fade-in-up">
          <div class="skill-icon" style="color:#F05032">🔧</div>
          <h4>Git</h4>
        </div>
        <div class="skill-card fade-in-up">
          <div class="skill-icon" style="color:#181717">🐙</div>
          <h4>GitHub</h4>
        </div>
        <div class="skill-card fade-in-up">
          <div class="skill-icon" style="color:#007ACC">🖥</div>
          <h4>VS Code</h4>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ EDUCATION SECTION ============ -->
  <section class="education section" id="education">
    <div class="container">
      <p class="section-eyebrow fade-in-up">Academic Background</p>
      <h2 class="section-title fade-in-up">Education</h2>

      <div class="timeline">
        <div class="timeline-item fade-in-up">
          <div class="timeline-dot"></div>
          <div class="timeline-card">
            <span class="timeline-year">2022 – 2026</span>
            <h3>B.Tech, Computer Science Engineering</h3>
            <p class="timeline-place">Sanjeevan group of institute , Panhala</p>
            <p class="timeline-detail">CGPA: 7 / 10</p>
          </div>
        </div>

        <div class="timeline-item fade-in-up">
          <div class="timeline-dot"></div>
          <div class="timeline-card">
            <span class="timeline-year">2022 – 2025</span>
            <h3>Diploma in Computer Science Engineering</h3>
            <p class="timeline-place">D.Y.Patil technical campus , Talsande </p>
            <p class="timeline-detail">Percentage: 82.51%</p>
          </div>
        </div>

        <div class="timeline-item fade-in-up">
          <div class="timeline-dot"></div>
          <div class="timeline-card">
            <span class="timeline-year">2021 – 2022</span>
            <h3>10th</h3>
            <p class="timeline-place">Shri Parashar HighSchool , Pargaon</p>
            <p class="timeline-detail">Percentage: 83%</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ PROJECTS SECTION ============ -->
  <section class="projects section section-alt" id="projects">
    <div class="container">
      <p class="section-eyebrow fade-in-up">My Work</p>
      <h2 class="section-title fade-in-up">Featured Projects</h2>
      <p class="section-subtitle fade-in-up">A selection of things I've built and shipped.</p>

      <div class="project-filters fade-in-up">
        <button class="filter-btn active" data-filter="all">All</button>
        <button class="filter-btn" data-filter="htmlcss">HTML/CSS</button>
        <button class="filter-btn" data-filter="java">Java</button>
        <button class="filter-btn" data-filter="php">PHP</button>
        <button class="filter-btn" data-filter="python">Python</button>
      </div>

      <div class="projects-grid" id="projectsGrid">

      <article class="project-card fade-in-up" data-category="php">
          <div class="project-img">
            <img src="images/project-placeholder-1.jpg" alt="Project screenshot" onerror="this.parentElement.classList.add('img-fallback')">
          </div>
          <div class="project-body">
            <h3>Identifying fake products through barcode </h3>
            <p>A barcode-based product verification system that helps users identify genuine and counterfeit products.</p>
            <div class="project-tags">
              <span>PHP</span><span>MySQL</span><span>JavaScript</span>
            </div>
            <div class="project-links">
              <a href="#" target="_blank" rel="noopener" class="btn btn-sm btn-outline">GitHub</a>
              <a href="" target="_blank" rel="noopener" class="btn btn-sm btn-primary">Live Demo</a>
            </div>
          </div>
        </article>

        <article class="project-card fade-in-up" data-category="php">
          <div class="project-img">
            <img src="images/project-placeholder-1.jpg" alt="Project screenshot" onerror="this.parentElement.classList.add('img-fallback')">
          </div>
          <div class="project-body">
            <h3>Roommate finder </h3>
            <p>A PHP-based web application that helps users find compatible roommates based on location, budget, and personal preferences.</p>
            <div class="project-tags">
              <span>PHP</span><span>MySQL</span><span>JavaScript</span>
            </div>
            <div class="project-links">
              <a href="#" target="_blank" rel="noopener" class="btn btn-sm btn-outline">GitHub</a>
              <a href="#" target="_blank" rel="noopener" class="btn btn-sm btn-primary">Live Demo</a>
            </div>
          </div>
        </article>

        <article class="project-card fade-in-up" data-category="java">
          <div class="project-img">
            <img src="images/project-placeholder-3.jpg" alt="Project screenshot" onerror="this.parentElement.classList.add('img-fallback')">
          </div>
          <div class="project-body">
            <h3>Library Management System</h3>
            <p>A desktop Java application for managing book inventory, issues and returns.</p>
            <div class="project-tags">
              <span>Java</span><span>room Database</span><span>JDBC</span>
            </div>
            <div class="project-links">
              <a href="#" target="_blank" rel="noopener" class="btn btn-sm btn-outline">GitHub</a>
              <a href="#" target="_blank" rel="noopener" class="btn btn-sm btn-primary">Live Demo</a>
            </div>
          </div>
        </article>

      </div>
    </div>
  </section>


  <!-- ============ CONTACT SECTION ============ -->
  <section class="contact section section-alt" id="contact">
    <div class="container">
      <p class="section-eyebrow fade-in-up">Get In Touch</p>
      <h2 class="section-title fade-in-up">Let's build something together</h2>
      <p class="section-subtitle fade-in-up">
        Have a project, internship opportunity, or just want to say hi? My inbox is open.
      </p>

      <div class="contact-grid">
        <div class="contact-info fade-in-up">
          <div class="contact-item">
            <span class="contact-icon">✉️</span>
            <div>
              <h4>Email</h4>
              <a href="mailto:pkapse9009@gmail.com">pkapse9009@gmail.com</a>
            </div>
          </div>
          <div class="contact-item">
            <span class="contact-icon">📞</span>
            <div>
              <h4>Phone</h4>
              <a href="tel:+919699219009">+91 9699219009</a>
            </div>
          </div>
          <div class="contact-item">
            <span class="contact-icon">📍</span>
            <div>
              <h4>Location</h4>
              <p>Talsande 
                Tal- Hatkangale 
                Dist- Kolhapur
                , India</p>
            </div>
          </div>
          <div class="contact-item">
            <span class="contact-icon">🐙</span>
            <div>
              <h4>GitHub</h4>
              <a href="<?php echo $githubUrl; ?>" target="_blank" rel="noopener"><?php echo parse_url($githubUrl, PHP_URL_HOST) . parse_url($githubUrl, PHP_URL_PATH); ?></a>
            </div>
          </div>
          <div class="contact-item">
            <span class="contact-icon">💼</span>
            <div>
              <h4>LinkedIn</h4>
              <a href="<?php echo $linkedinUrl; ?>" target="_blank" rel="noopener"><?php echo parse_url($linkedinUrl, PHP_URL_HOST) . parse_url($linkedinUrl, PHP_URL_PATH); ?></a>
            </div>
          </div>
        </div>

        <form class="contact-form fade-in-up" id="contactForm" action="send_mail.php" method="POST" novalidate>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Your full name" required>
            <span class="form-error" id="nameError"></span>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="you@example.com" required>
            <span class="form-error" id="emailError"></span>
          </div>

          <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" placeholder="What's this about?" required>
            <span class="form-error" id="subjectError"></span>
          </div>

          <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="5" placeholder="Tell me about your project or opportunity..." required></textarea>
            <span class="form-error" id="messageError"></span>
          </div>

          <button type="submit" class="btn btn-primary btn-block" id="submitBtn">
            <span class="btn-text">Send Message</span>
            <span class="btn-spinner" hidden></span>
          </button>

          <div class="form-status" id="formStatus" role="status" aria-live="polite"></div>
        </form>
      </div>
    </div>
  </section>

</main>

<!-- ============ FOOTER ============ -->
<footer class="footer">
  <div class="container footer-grid">
    <div class="footer-brand">
      <a href="#home" class="nav-logo">
        <span class="logo-mark">PK</span>
        <span class="logo-text">Prasad kapse</span>
      </a>
      <p>Computer Science Engineering Student building clean, practical software.</p>
    </div>

    <div class="footer-links">
      <h4>Quick Links</h4>
      <a href="#home">Home</a>
      <a href="#about">About</a>
      <a href="#skills">Skills</a>
      <a href="#projects">Projects</a>
      <a href="#contact">Contact</a>
    </div>

    <div class="footer-social">
      <h4>Connect</h4>
      <div class="social-row">
        <a href="<?php echo $githubUrl; ?>" target="_blank" rel="noopener" aria-label="GitHub" class="social-icon">
          <svg viewBox="0 0 24 24" width="18" height="18"><path fill="currentColor" d="M12 .5C5.73.5.5 5.73.5 12c0 5.08 3.29 9.39 7.86 10.91.57.1.78-.25.78-.55v-2.14c-3.2.7-3.87-1.36-3.87-1.36-.53-1.33-1.29-1.69-1.29-1.69-1.05-.72.08-.71.08-.71 1.17.08 1.78 1.2 1.78 1.2 1.03 1.77 2.71 1.26 3.37.96.1-.75.4-1.26.73-1.55-2.55-.29-5.23-1.28-5.23-5.68 0-1.26.45-2.28 1.19-3.08-.12-.29-.52-1.46.11-3.04 0 0 .97-.31 3.18 1.18a11 11 0 0 1 5.79 0c2.2-1.49 3.17-1.18 3.17-1.18.64 1.58.24 2.75.12 3.04.74.8 1.19 1.82 1.19 3.08 0 4.41-2.69 5.38-5.25 5.67.41.36.78 1.07.78 2.16v3.2c0 .3.21.66.79.55A10.51 10.51 0 0 0 23.5 12c0-6.27-5.23-11.5-11.5-11.5Z"/></svg>
        </a>
        <a href="<?php echo $linkedinUrl; ?>" target="_blank" rel="noopener" aria-label="LinkedIn" class="social-icon">
          <svg viewBox="0 0 24 24" width="18" height="18"><path fill="currentColor" d="M20.45 20.45h-3.56v-5.57c0-1.33-.02-3.03-1.85-3.03-1.85 0-2.14 1.45-2.14 2.94v5.66H9.34V9h3.42v1.56h.05c.48-.9 1.64-1.85 3.38-1.85 3.61 0 4.28 2.38 4.28 5.47v6.27ZM5.34 7.43a2.07 2.07 0 1 1 0-4.13 2.07 2.07 0 0 1 0 4.13ZM7.12 20.45H3.56V9h3.56v11.45ZM22.22 0H1.77C.79 0 0 .77 0 1.73v20.54C0 23.23.79 24 1.77 24h20.45c.98 0 1.78-.77 1.78-1.73V1.73C24 .77 23.2 0 22.22 0Z"/></svg>
        </a>
        <a href="mailto:<?php echo $userEmail; ?>" aria-label="Email" class="social-icon">
          <svg viewBox="0 0 24 24" width="18" height="18"><path fill="currentColor" d="M2 4h20a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1Zm19 3.24-8.4 6.3a1 1 0 0 1-1.2 0L3 7.24V19h18V7.24ZM3.4 5l8.6 6.45L20.6 5H3.4Z"/></svg>
        </a>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <p>&copy; <?php echo date("Y"); ?> <?php echo $siteName; ?>. All rights reserved.</p>
  </div>
</footer>

<button class="back-to-top" id="backToTop" aria-label="Back to top">↑</button>

<script src="js/typing.js"></script>
<script src="js/validation.js"></script>
<script src="js/script.js"></script>
</body>
</html>
