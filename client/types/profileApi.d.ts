
export interface Summary {
  id?: number
  reference: string
  body: string
}
export type Summaries = Array<Summary>

export interface Achievement {
  id?: number
  reference: string
  work_experience_id?: number
  title: string
  description: string
}
export interface Experience {
  id?: number
  reference: string
  company: string
  title: string
  position: string
  stack?: string
  start_year: string | object
  end_year: string | object
  till_present: boolean
  image_url: string
  achievements?: Array<Achievement>
}
export type Experiences = Array<Experience >

export interface Educate {
  id?: number
  reference: string
  school: string
  course: string
  start_year: string
  end_year: string
}
export type Education = Array<Educate>

export interface Skill {
  id?: number
  reference: string
  category: string
  name: string
  level: number
  description: string
}
export type Skills = Array<Skill>

export interface Interest {
  id?: number
  reference: string
  name: string
  description: string
}
export type Interests = Array<Interest>

export interface Profiles {
  summaries: Array<Summaries>
  experiences: Array<Experiences>
  education: Array<Education>
  skills: Array<Skills>
  interests: Array<Interests>
}
