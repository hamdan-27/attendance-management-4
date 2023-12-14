function loadContent(page) {

    fetch(page + '.html') 
      .then(response => response.text())
      .then(data => {
        document.getElementById('content').innerHTML = data;
        // Manually execute scripts if needed
        // e.g., if there are script tags in the fetched content
    //     const scripts = document.getElementById('container').getElementsByTagName('script');
    //     for (let script of scripts) {
    //       eval(script.innerHTML);
    // }
    // Reattach event listeners if needed
    // e.g., if there are event listeners in the fetched content
    // document.getElementById('yourButton').addEventListener('click', yourFunction);
      })
      .catch(error => console.error('Error loading content:', error));
  }
  
  function showContent(contentId) {
    // Hide all content divs
    var contentDivs = document.querySelectorAll('#content div');
    contentDivs.forEach(function (div) {
      div.classList.remove('active');
    });
  
    // Show the selected content
    var selectedContent = document.getElementById(contentId);
    if (selectedContent) {
      selectedContent.classList.add('active');
    }
  }
  
  function toggleDropdown() {
    var userDropdown = document.getElementById('user-dropdown');
    userDropdown.classList.toggle('show');
  }
  
  // Close the dropdown if the user clicks outside of it
  window.onclick = function (event) {
    if (!event.target.matches('.sidebar-btn')) {
      var dropdowns = document.getElementsByClassName("dropdown-menu");
      for (var i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }
  