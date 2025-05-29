<x-app-layout>
    <style>
        .form-container {
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            margin-bottom: 3%;
            margin-top: 3%;
        }
        .form-container h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #45a049;
        }
        select{
            border-radius: 5px;
        }
        select:hover{
            background-color:rgba(100, 124, 101, 0.32);
        }
    </style>
<div class="form-container">
    <h1>Upload Resource</h1>
    <form action="{{route('resource.add')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description"></textarea>
        </div>


        <div class="form-group"> 
            <select name="linkOrfile" id="linkOrfile">
                <option value="resourceType" selected>Resource Type</option>
                <option value="link">Embeded Link</option>
                <option value="file">File</option>
            </select>
            <div class="form-group" id="linkinput" style="display: none;">
                <label for="link">Embeded Link</label>
                <input type="text" name="link" id="link">
            </div>
            
            <div class="form-group" id="fileinput" style="display: none;">
            <label for="file_path">File Upload</label>
            <input type="file" id="file_path" name="file_path" required>
        </div>
        </div>

        <script>
           document.getElementById("linkOrfile").addEventListener("change", function () {
                if (this.value === "file") {
                    document.getElementById("linkinput").style.display = "none";
                    document.getElementById("fileinput").style.display = "block";
                    document.getElementById("link").value="";
                } else {
                    document.getElementById("linkinput").style.display = "block";
                    document.getElementById("fileinput").style.display = "none";
                    document.getElementById("file_path").value = null;

                }
            });

        </script>
        <div class="form-group">
            <button type="submit">Submit Resource</button>
        </div>
    </form>
</div>
</x-app-layout>