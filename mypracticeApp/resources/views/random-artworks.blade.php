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
                        // Extracting the first image URL if available
                        const imageUrl = getImageUrl(artwork);
                        if (imageUrl) {
                            const imageElement = document.createElement('img');
                            imageElement.src = imageUrl;
                            imageElement.alt = artwork.title;
                            artworksDiv.appendChild(imageElement);
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
                        // Return the first image URL found
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
