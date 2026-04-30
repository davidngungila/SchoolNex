@extends('layouts.app')

@section('title', 'Library Books Catalog')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Library Books Catalog</h5>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addBookModal">
                        <i class="bx bx-plus me-1"></i> Add Book
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importModal">
                        <i class="bx bx-upload me-1"></i> Import Books
                    </button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#catalogModal">
                        <i class="bx bx-book me-1"></i> Catalog Report
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Statistics Cards -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">2,845</h4>
                                        <p class="mb-0">Total Books</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-book avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">1,892</h4>
                                        <p class="mb-0">Available</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-check-circle avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-warning text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">847</h4>
                                        <p class="mb-0">Issued</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-time avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-danger text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-0">106</h4>
                                        <p class="mb-0">Overdue</p>
                                    </div>
                                    <div class="avatar">
                                        <i class="bx bx-error avatar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="categoryFilter" class="form-label">Category</label>
                        <select class="form-select" id="categoryFilter">
                            <option value="">All Categories</option>
                            <option value="fiction">Fiction</option>
                            <option value="non-fiction">Non-Fiction</option>
                            <option value="science">Science</option>
                            <option value="mathematics">Mathematics</option>
                            <option value="history">History</option>
                            <option value="literature">Literature</option>
                            <option value="reference">Reference</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="authorFilter" class="form-label">Author</label>
                        <input type="text" class="form-control" id="authorFilter" placeholder="Author name...">
                    </div>
                    <div class="col-md-2">
                        <label for="publisherFilter" class="form-label">Publisher</label>
                        <input type="text" class="form-control" id="publisherFilter" placeholder="Publisher...">
                    </div>
                    <div class="col-md-2">
                        <label for="statusFilter" class="form-label">Status</label>
                        <select class="form-select" id="statusFilter">
                            <option value="">All Status</option>
                            <option value="available">Available</option>
                            <option value="issued">Issued</option>
                            <option value="reserved">Reserved</option>
                            <option value="lost">Lost</option>
                            <option value="damaged">Damaged</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="searchBook" class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchBook" placeholder="Title, ISBN...">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <button type="button" class="btn btn-outline-primary w-100">
                            <i class="bx bx-search"></i> Search
                        </button>
                    </div>
                </div>

                <!-- Books Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Cover</th>
                                <th>Book ID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>ISBN</th>
                                <th>Publisher</th>
                                <th>Year</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="https://via.placeholder.com/50x70/696cff/ffffff?text=B1" alt="Book Cover" class="rounded">
                                </td>
                                <td><strong>B001</strong></td>
                                <td>Mathematics for Advanced Level</td>
                                <td>John Smith</td>
                                <td><span class="badge bg-info">Mathematics</span></td>
                                <td>978-0-123456-78-9</td>
                                <td>Oxford Press</td>
                                <td>2022</td>
                                <td><span class="badge bg-success">Available</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-user me-2"></i>Issue Book</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-bookmark me-2"></i>Reserve</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="https://via.placeholder.com/50x70/71dd37/ffffff?text=B2" alt="Book Cover" class="rounded">
                                </td>
                                <td><strong>B002</strong></td>
                                <td>English Literature Anthology</td>
                                <td>Sarah Johnson</td>
                                <td><span class="badge bg-primary">Literature</span></td>
                                <td>978-0-234567-89-0</td>
                                <td>Cambridge Press</td>
                                <td>2021</td>
                                <td><span class="badge bg-warning">Issued</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-refresh me-2"></i>Return Book</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-history me-2"></i>View History</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="https://via.placeholder.com/50x70/00cfe8/ffffff?text=B3" alt="Book Cover" class="rounded">
                                </td>
                                <td><strong>B003</strong></td>
                                <td>Physics: Principles and Applications</td>
                                <td>Dr. Michael Brown</td>
                                <td><span class="badge bg-info">Science</span></td>
                                <td>978-0-345678-90-1</td>
                                <td>Pearson Education</td>
                                <td>2023</td>
                                <td><span class="badge bg-success">Available</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-user me-2"></i>Issue Book</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-bookmark me-2"></i>Reserve</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="https://via.placeholder.com/50x70/ff3e1d/ffffff?text=B4" alt="Book Cover" class="rounded">
                                </td>
                                <td><strong>B004</strong></td>
                                <td>Chemistry: The Central Science</td>
                                <td>Emily Davis</td>
                                <td><span class="badge bg-info">Science</span></td>
                                <td>978-0-456789-01-2</td>
                                <td>McGraw Hill</td>
                                <td>2022</td>
                                <td><span class="badge bg-danger">Overdue</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-bell me-2"></i>Send Reminder</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-dollar me-2"></i>Calculate Fine</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-warning" href="#"><i class="bx bx-x-circle me-2"></i>Mark Lost</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="https://via.placeholder.com/50x70/696cff/ffffff?text=B5" alt="Book Cover" class="rounded">
                                </td>
                                <td><strong>B005</strong></td>
                                <td>Biology: Life on Earth</td>
                                <td>Dr. Robert Wilson</td>
                                <td><span class="badge bg-info">Science</span></td>
                                <td>978-0-567890-12-3</td>
                                <td>National Geographic</td>
                                <td>2021</td>
                                <td><span class="badge bg-warning">Reserved</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-user me-2"></i>Issue Book</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-x me-2"></i>Cancel Reservation</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="https://via.placeholder.com/50x70/71dd37/ffffff?text=B6" alt="Book Cover" class="rounded">
                                </td>
                                <td><strong>B006</strong></td>
                                <td>World History: Ancient Civilizations</td>
                                <td>James Anderson</td>
                                <td><span class="badge bg-secondary">History</span></td>
                                <td>978-0-678901-23-4</td>
                                <td>HarperCollins</td>
                                <td>2020</td>
                                <td><span class="badge bg-success">Available</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-user me-2"></i>Issue Book</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-bookmark me-2"></i>Reserve</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="https://via.placeholder.com/50x70/ffab00/ffffff?text=B7" alt="Book Cover" class="rounded">
                                </td>
                                <td><strong>B007</strong></td>
                                <td>Geography: Physical and Human</td>
                                <td>Lisa Martinez</td>
                                <td><span class="badge bg-secondary">Geography</span></td>
                                <td>978-0-789012-34-5</td>
                                <td>Routledge</td>
                                <td>2023</td>
                                <td><span class="badge bg-secondary">Lost</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-replace me-2"></i>Replace Book</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-dollar me-2"></i>Charge Fine</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-success" href="#"><i class="bx bx-check me-2"></i>Mark Found</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="https://via.placeholder.com/50x70/00cfe8/ffffff?text=B8" alt="Book Cover" class="rounded">
                                </td>
                                <td><strong>B008</strong></td>
                                <td>Fine Arts: Creative Expression</td>
                                <td>Jennifer Taylor</td>
                                <td><span class="badge bg-purple">Arts</span></td>
                                <td>978-0-890123-45-6</td>
                                <td>Thames & Hudson</td>
                                <td>2022</td>
                                <td><span class="badge bg-success">Available</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-show me-2"></i>View Details</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-user me-2"></i>Issue Book</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bx bx-bookmark me-2"></i>Reserve</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center mt-3">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Add Book Modal -->
<div class="modal fade" id="addBookModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Book</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <!-- Basic Information -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Basic Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="bookCover" class="form-label">Book Cover</label>
                                    <input type="file" class="form-control" id="bookCover" accept="image/*">
                                    <small class="text-muted">Upload book cover image</small>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="bookTitle" class="form-label">Book Title *</label>
                                    <input type="text" class="form-control" id="bookTitle" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="bookAuthor" class="form-label">Author *</label>
                                    <input type="text" class="form-control" id="bookAuthor" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="bookISBN" class="form-label">ISBN</label>
                                    <input type="text" class="form-control" id="bookISBN" placeholder="978-0-123456-78-9">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="bookCategory" class="form-label">Category *</label>
                                    <select class="form-select" id="bookCategory" required>
                                        <option value="">Select Category</option>
                                        <option value="fiction">Fiction</option>
                                        <option value="non-fiction">Non-Fiction</option>
                                        <option value="science">Science</option>
                                        <option value="mathematics">Mathematics</option>
                                        <option value="history">History</option>
                                        <option value="literature">Literature</option>
                                        <option value="reference">Reference</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="bookPublisher" class="form-label">Publisher</label>
                                    <input type="text" class="form-control" id="bookPublisher">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="bookYear" class="form-label">Publication Year</label>
                                    <input type="number" class="form-control" id="bookYear" min="1900" max="{{ date('Y') }}">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="bookLanguage" class="form-label">Language</label>
                                    <select class="form-select" id="bookLanguage">
                                        <option value="english">English</option>
                                        <option value="swahili">Swahili</option>
                                        <option value="french">French</option>
                                        <option value="german">German</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="bookPages" class="form-label">Number of Pages</label>
                                    <input type="number" class="form-control" id="bookPages" min="1">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="bookCopies" class="form-label">Number of Copies *</label>
                                    <input type="number" class="form-control" id="bookCopies" min="1" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="bookLocation" class="form-label">Shelf Location</label>
                                    <input type="text" class="form-control" id="bookLocation" placeholder="e.g., A1-23">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="bookDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="bookDescription" rows="3" placeholder="Enter book description..."></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Acquisition Details -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Acquisition Details</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="acquisitionDate" class="form-label">Acquisition Date</label>
                                    <input type="date" class="form-control" id="acquisitionDate" value="{{ date('Y-m-d') }}">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="acquisitionSource" class="form-label">Source</label>
                                    <select class="form-select" id="acquisitionSource">
                                        <option value="purchase">Purchase</option>
                                        <option value="donation">Donation</option>
                                        <option value="gift">Gift</option>
                                        <option value="exchange">Exchange</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="bookCost" class="form-label">Cost per Book</label>
                                    <input type="number" class="form-control" id="bookCost" min="0" step="0.01">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="supplier" class="form-label">Supplier</label>
                                    <input type="text" class="form-control" id="supplier">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Classification -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0">Classification</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="deweyClass" class="form-label">Dewey Decimal Class</label>
                                    <input type="text" class="form-control" id="deweyClass" placeholder="e.g., 510">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="subjectHeading" class="form-label">Subject Heading</label>
                                    <input type="text" class="form-control" id="subjectHeading">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="keywords" class="form-label">Keywords</label>
                                    <input type="text" class="form-control" id="keywords" placeholder="Comma separated">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Draft</button>
                <button type="button" class="btn btn-success">Add Book</button>
            </div>
        </div>
    </div>
</div>

<!-- Import Books Modal -->
<div class="modal fade" id="importModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Books</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="importFile" class="form-label">Select Excel File</label>
                    <input type="file" class="form-control" id="importFile" accept=".xlsx,.xls,.csv">
                    <small class="text-muted">Upload Excel file with book data</small>
                </div>
                <div class="mb-3">
                    <a href="#" class="btn btn-outline-primary btn-sm">
                        <i class="bx bx-download me-1"></i> Download Template
                    </a>
                    <small class="text-muted ms-2">Download the template to understand the required format</small>
                </div>
                <div class="alert alert-info">
                    <i class="bx bx-info-circle me-2"></i>
                    Required fields: Title, Author, Category, Number of Copies
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Import Books</button>
            </div>
        </div>
    </div>
</div>

<!-- Catalog Report Modal -->
<div class="modal fade" id="catalogModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Library Catalog Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="reportType" class="form-label">Report Type</label>
                    <select class="form-select" id="reportType">
                        <option value="complete">Complete Catalog</option>
                        <option value="by_category">By Category</option>
                        <option value="by_author">By Author</option>
                        <option value="by_publisher">By Publisher</option>
                        <option value="acquisition">Acquisition Report</option>
                        <option value="usage">Usage Statistics</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="reportFormat" class="form-label">Format</label>
                    <select class="form-select" id="reportFormat">
                        <option value="pdf">PDF</option>
                        <option value="excel">Excel</option>
                        <option value="csv">CSV</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Include Sections</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="includeBasic" checked>
                        <label class="form-check-label" for="includeBasic">
                            Basic Information
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="includeStats" checked>
                        <label class="form-check-label" for="includeStats">
                            Statistics
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="includeCharts">
                        <label class="form-check-label" for="includeCharts">
                            Charts & Graphs
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info">Generate Report</button>
            </div>
        </div>
    </div>
</div>
@endsection
