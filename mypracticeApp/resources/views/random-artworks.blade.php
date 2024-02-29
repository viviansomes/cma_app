<!-- resources/views/random-artworks.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Artworks</title>
</head>
<body>
    <div id="artworks"></div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch('/random-artworks')
                .then(response => response.json())
                .then(data => {
                    const artworksDiv = document.getElementById('artworks');
                    data.data.forEach(artwork => {
                        // Extracting the image URL
                        const imageUrl = getImageUrl(artwork);
                        if (imageUrl) {
                            // Creating an anchor element to display the URL
                            const anchor = document.createElement('a');
                            anchor.href = imageUrl;
                            anchor.textContent = imageUrl;
                            artworksDiv.appendChild(anchor);
                            artworksDiv.appendChild(document.createElement('br')); // Add a line break for better separation
                        }
                    });
                })
                .catch(error => console.error('Error fetching random artworks:', error));
        });

        // Function to extract the image URL from the artwork object
        function getImageUrl(artwork) {
            // Check if the 'images' property exists and is an array
            if (artwork.hasOwnProperty('images') && Array.isArray(artwork.images)) {
                // Iterate over each image object in the 'images' array
                for (const image of artwork.images) {
                    // Check if the image object has a 'url' property
                    if (image.hasOwnProperty('url')) {
                        // Return the image URL
                        return image.url;
                    }
                }
            }
            // If no image URL found, return null
            return null;
        }
    </script>
</body>
</html>
