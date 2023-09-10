<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title" key="t-menu">Menu</li>



        <li>
            <a href="{{ route('contacts.index') }}" class="waves-effect">
                <i class="bx bx-home-circle"></i>
                <span key="t-dashboards">Contacts</span>
            </a>

        </li>
        {{-- End - loation --}}
        <li class="menu-title" key="t-menu">Web Contents</li>



        {{-- award --}}
        {{-- <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-home-circle"></i>
                <span key="t-award">award</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('awards.index') }}" key="t-list">All award</a></li>
        <li><a href="{{ route('awards.create') }}" key="t-create">Create award</a></li>

    </ul>
    </li> --}}
    {{-- End - award --}}

    {{-- service --}}
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="bx bx-home-circle"></i>
            <span key="t-service">Service</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('services.index') }}" key="t-list">All Service</a></li>
            <li><a href="{{ route('services.create') }}" key="t-create">Create Service</a></li>

        </ul>
    </li>
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="bx bx-home-circle"></i>
            <span key="t-project">Project</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('projects.index') }}" key="t-list">All Project</a></li>
            <li><a href="{{ route('projects.create') }}" key="t-create">Create Project</a></li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-home-circle"></i>
                    <span key="t-attribiutes">attribiutes</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-home-circle"></i>
                            <span key="t-location">location</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('locations.index') }}" key="t-list">All location</a></li>
                            <li><a href="{{ route('locations.create') }}" key="t-create">Create location</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-home-circle"></i>
                            <span key="t-propertytype">Property Type</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('propertytypes.index') }}" key="t-list">All Property Type</a></li>
                            <li><a href="{{ route('propertytypes.create') }}" key="t-create">Create Property Type</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-home-circle"></i>
                            <span key="t-propertystatus">Property Status</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('propertystatus.index') }}" key="t-list">All Property Status</a></li>
                            <li><a href="{{ route('propertystatus.create') }}" key="t-create">Create Property Status</a></li>

                        </ul>
                    </li>
                </ul>
            </li>

        </ul>
    </li>
    {{-- End - service --}}
    {{-- client --}}
    {{-- <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-home-circle"></i>
                <span key="t-client">Clients</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('clients.index') }}" key="t-list">All Client</a></li>
    <li><a href="{{ route('clients.create') }}" key="t-create">Add Client</a></li>

    </ul>
    </li> --}}
    {{-- End - client --}}

    {{-- testimonial --}}
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="bx bx-home-circle"></i>
            <span key="t-testimonial">Testimonial</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('testimonials.index') }}" key="t-list">All Testimonial</a></li>
            <li><a href="{{ route('testimonials.create') }}" key="t-create">Create Testimonial</a></li>

        </ul>
    </li>
    {{-- End - service --}}

    {{-- start - hero --}}
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="bx bx-home-circle"></i>
            <span key="t-hero">Hero</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('heros.index') }}" key="t-list">All Hero</a></li>
            <li><a href="{{ route('heros.create') }}" key="t-create">Create Hero</a></li>

        </ul>
    </li>
    {{-- End - hero --}}
    {{-- start - blog --}}
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="bx bx-home-circle"></i>
            <span key="t-blog">Blog</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('blogs.index') }}" key="t-list">All Blog</a></li>
            <li><a href="{{ route('blogs.create') }}" key="t-create">Create Blog</a></li>

        </ul>
    </li>
    {{-- End - blog --}}
    {{-- start - news --}}
    {{-- <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-home-circle"></i>
                <span key="t-news">NEWS/Publication</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('news.index') }}" key="t-list">All News/Publication</a></li>
    <li><a href="{{ route('news.create') }}" key="t-create">Create News/Publication</a></li>

    </ul>
    </li> --}}
    {{-- End - news --}}
    {{-- photo --}}
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="bx bx-home-circle"></i>
            <span key="t-photo">Gallery</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('photos.index') }}" key="t-list">All Photo</a></li>
            <li><a href="{{ route('photos.create') }}" key="t-create">Add Photo</a></li>

        </ul>
    </li>
    {{-- End - photo --}}

    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="bx bx-home-circle"></i>
            <span key="t-hero">Website Content</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('about.edit',1) }}" key="t-list">About Us</a></li>
            <li><a href="{{ route('contact.edit',1) }}" key="t-list">Contact Info</a></li>
            <li><a href="{{ route('general.edit',1) }}" key="t-list">General Setting</a></li>
            <li><a href="{{ route('social.edit',1) }}" key="t-list">Social Setting</a></li>

        </ul>

    </li>
    {{-- End - hero --}}
    </ul>
</div>
