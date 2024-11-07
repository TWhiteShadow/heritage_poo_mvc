<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
    <link rel="stylesheet" href="/path/to/your/css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Book Details</h1>
        <?php if (isset($book)): ?>
            <div class="book-details">
                <h2><?php echo htmlspecialchars($book['title']); ?></h2>
                <p><strong>Author:</strong> <?php echo htmlspecialchars($book['author']); ?></p>
                <p><strong>Is Available:</strong> <?php echo $book['available'] ? 'Yes' : 'No'; ?></p>
                <p><strong>Page Number:</strong> <?php echo $book['pageNumber']; ?></p>
            </div>
        <?php else: ?>
            <p>Book not found.</p>
        <?php endif; ?>
        <a href="/books">Back to Book List</a>
    </div>
</body>
</html>