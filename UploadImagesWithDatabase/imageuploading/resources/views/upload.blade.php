<div>
    <!-- Life is available only in the present moment. - Thich Nhat Hanh -->

    <h1>Upload Image</h1>

    <form action="upload" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" />
        <button>Upload</button>
    </form>
</div>
