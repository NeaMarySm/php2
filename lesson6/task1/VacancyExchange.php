<?php

namespace lesson6\hh;

use SplObserver;

class VacancyExchange implements \SplSubject{

    private $vacancies = [];
    private $observers = [];

    public function __construct()
    {
        // Специальная группа событий для наблюдателей, которые хотят получать
        // все вакансии(всех категорий).
        $this->observers["all"] = [];
    }

    private function initCategoryGroup(string $category = "all"): void
    {
        if (!isset($this->observers[$category])) {
            $this->observers[$category] = [];
        }
    }

    private function getCategoryObservers(string $category = "all"): array
    {
        $this->initCategoryGroup($category);
        $group = $this->observers[$category];
        $all = $this->observers["all"];

        return array_merge($group, $all);
    }

    public function attach(\SplObserver $user, string $category = "all"): void
    {
        $this->initCategoryGroup($category);

        $this->observers[$category][] = $user;
    }

    public function detach(\SplObserver $user, string $category = "all"): void
    {
        foreach ($this->getCategoryObservers($category) as $key => $observer) {
            if ($observer === $user) {
                unset($this->observers[$category][$key]);
            }
        }
    }

    public function notify(string $category = "all", $data = null): void
    {
        echo "New $category vacancy added.\n";
        foreach ($this->getCategoryObservers($category) as $observer) {
            $observer->update($this, $category, $data);
        }
    }

    public function createNewVacancy($id, $category, $description)
    {
        $vacancy = new Vacancy($id, $category, $description);
        $this->vacancies[] = $vacancy;

        $this->notify($category, $vacancy);

        return $vacancy;
    }


}

