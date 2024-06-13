function updateClock() {
        const clock = document.getElementById("clock");
        const now = new Date();

        const hours = String(now.getHours()).padStart(2, "0");
        const minutes = String(now.getMinutes()).padStart(2, "0");

        const days = [
          "Sunday",
          "Monday",
          "Tuesday",
          "Wednesday",
          "Thursday",
          "Friday",
          "Saturday",
        ];
        const months = [
          "January",
          "February",
          "March",
          "April",
          "May",
          "June",
          "July",
          "August",
          "September",
          "October",
          "November",
          "December",
        ];
        const day = days[now.getDay()];
        const month = months[now.getMonth()];
        const date = now.getDate();

        const timeString = `${hours}:${minutes}`;
        const dateString = `${day}, ${month} ${date}`;

        clock.innerHTML = `<div class="time text-white text-5xl font-medium">${timeString}</div><div class="date font-medium">${dateString}</div>`;
      }

      updateClock();
      setInterval(updateClock, 60000);

      document
        .getElementById("notification-icon")
        .addEventListener("click", function () {
          const notificationDiv = document.getElementById("notification");
          notificationDiv.classList.toggle("hidden");
        });

        //Search Contiainer Functionality
      document
        .getElementById("search-icon")
        .addEventListener("click", function () {
          const searchDiv = document.getElementById("search");
          searchDiv.classList.toggle("hidden");
        });


    desktoplightapp();
        
        function desktoplightapp(){
            $.ajax({
                url: desktopapp,
                method: 'GET',
                data: {},
                success: function (response) {
                    // Update the app list container with the updated list
                    $('.desktop-apps').html(response.html);
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
            
            
        }
        
    
        
        function createFolderInsideAnother(parentFolder){
            $.ajax({
                url: createFolderRoute,
                method: 'GET',
                data: {parentFolder: parentFolder},
                success: function (response) {
                    desktoplightapp();
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
            
            
        }
        
        
        
        //// right click functionality 
        
        //// right click functions 
        document.getElementById("refreshButton").addEventListener("click", function(e) {
            e.preventDefault();
            location.reload();
        });
       
        document.getElementById('createFolderdesktop').addEventListener('click', function(event) {
            event.preventDefault();
            const parentFolder = 'Desktop';
            createFolderInsideAnother(parentFolder);
        });
        
        
        
        
        ////// end here 
        
        $(document).on('dblclick', '.openiframe', function (e) {
            e.preventDefault();
            
            const iframeUrl = this.getAttribute('data-url');
                const iframeTitle = this.getAttribute('data-title');
                const iframeImage = this.getAttribute('data-image');
                openiframe(iframeUrl,iframeTitle,iframeImage);
        });
        
        function openiframe(iframeUrl,iframeTitle,iframeImage){
                document.getElementById('iframePopup').classList.remove('hidden');
                document.getElementById('iframeimageid').classList.remove('hidden');
                const iframe = document.getElementById('iframe');
                iframe.src = iframeUrl;
                iframe.title = iframeTitle;
                 document.getElementById('iframeheadingid').innerHtml=iframeTitle;
                 const maximizeIcon = document.getElementById('iframeimageid');
                 maximizeIcon.src=iframeImage;
        }
        
         function closeiframe(){
            document.getElementById('iframePopup').classList.add('hidden');
            document.getElementById('iframeimageid').classList.add('hidden');
        }
        
        function minimise(){
            const popup = document.getElementById('iframePopup');
            popup.classList.toggle('minimized');
            
            document.getElementById('iframePopup').classList.add('hidden');
        }
        function maximise(){
            const popup = document.getElementById('iframePopup');
            popup.classList.toggle('maximized');
        }
        function taskbar(){
             //document.getElementById('iframePopup').classList.remove('hidden');
             const popup = document.getElementById('iframePopup');
             popup.classList.toggle('minimized');
             popup.classList.toggle('hidden');
        }
        
       
            
        // document.addEventListener('DOMContentLoaded', function() {
        //     const appContainer = document.getElementById('desktopapps');
        //     if (appContainer) {
        //         appContainer.addEventListener('click', function(event) {
        //             if (event.target.classList.contains('openiframe')) {
        //                 alert("");
        //                 // Access information about the clicked app
        //                 const iframeUrl = event.target.dataset.url;
        //                 const iframeTitle = event.target.dataset.title;
        //                 const iframeImage = event.target.dataset.image;
        //                 openiframe(iframeUrl,iframeTitle,iframeImage);
                        
        //             }
        //         });
        //     }
        // });

      

      