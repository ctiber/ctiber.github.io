import os

# Folder containing your images
folder = "."
output_file = os.path.join(folder, "index.html")

# Collect all JPG/JPEG files
files = sorted([
    f for f in os.listdir(folder)
    if f.lower().endswith((".jpg", ".jpeg"))
])

# Generate the HTML file
with open(output_file, "w", encoding="utf-8") as f:
    f.write("""<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Image Gallery</title>
<style>
  body {
    font-family: sans-serif;
    background: #fafafa;
    margin: 20px;
  }
  h1 {
    text-align: center;
  }
  .gallery {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
    justify-items: center;
  }
  .card {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    overflow: hidden;
    text-align: center;
    width: 200px;
  }
  .card img {
    width: 100%;
    height: auto;
    display: block;
  }
  .card a {
    display: block;
    padding: 8px;
    text-decoration: none;
    color: #333;
  }
  .card a:hover {
    background: #f0f0f0;
  }
</style>
</head>
<body>
<h1>Image Gallery</h1>
<div class="gallery">
""")

    for filename in files:
        f.write(f"""
  <div class="card">
    <a href="{filename}">
      <img src="{filename}" alt="{filename}">
      <div>{filename}</div>
    </a>
  </div>
""")

    f.write("""
</div>
</body>
</html>
""")

print(f"✅ Generated: {output_file}")
