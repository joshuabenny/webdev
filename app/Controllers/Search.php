<?php

namespace App\Controllers;
use App\Models\BlogsModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Search extends BaseController

{
    public function searchSuggestions()
    {
        $searchTerm = $this->request->getVar('query');
        // Load models
        $blogsModel = new BlogsModel();
        // Query media table
        $blogsResults = $blogsModel
            ->like('title', $searchTerm, 'both')
            ->limit(5) // Limiting media results
            ->findAll();
        // Prepare combined suggestions
        $suggestions = [];
        // Add media suggestions
        foreach ($blogsResults as $blogs) {
            $suggestions[] = [
                'Title' => $blogs['title'],
                'Body' => $blogs['body'], // Adjust as needed
                'Slug' => $blogs['slug'], // Use 'id' instead of 'slug' for media
                'Type' => 'blogs', // Indicate the type of suggestion
            ];
        }
        return $this->response->setJSON($suggestions);
    }

    
}